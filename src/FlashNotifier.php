<?php

namespace Tnt\FlashMessage;

use Oak\Dispatcher\Facade\Dispatcher;
use Oak\Session\Facade\Session;
use Tnt\FlashMessage\Contracts\FlashNotifierInterface;
use Tnt\FlashMessage\Events\Notify;

class FlashNotifier implements FlashNotifierInterface
{
	/**
	 * @var array
	 */
	private $messages = [];

	/**
	 * FlashNotifier constructor.
	 */
	public function __construct()
	{
		if (Session::has('flashes')) {
			$this->messages = Session::get('flashes');
		}
	}

	/**
	 * @param string $message
	 * @param string $type
	 */
	public function message(string $message, string $type = 'info')
	{
		$this->messages[] = [
			'text' => $message,
			'type' => $type,
		];

		$this->save();
	}

	/**
	 * @param string $message
	 */
	public function success(string $message)
	{
		$this->message($message, 'success');
	}

	/**
	 * @param string $message
	 */
	public function error(string $message)
	{
		$this->message($message, 'error');
	}

	/**
	 * @param string $message
	 */
	public function warning(string $message)
	{
		$this->message($message, 'warning');
	}

	/**
	 * Get the messages
	 * @return array
	 */
	public function getMessages(): array
	{
		$messages = $this->messages;

		$this->messages = [];
		$this->save();

		return array_map(function($message) {

			$message = new Message($message['text'], $message['type']);

			Dispatcher::dispatch(Notify::class, new Notify($message));

			return $message;

		}, $messages);
	}

	/**
	 * Save the messages to the session
	 */
	private function save()
	{
		Session::set('flashes', $this->messages);
		Session::save();
	}
}