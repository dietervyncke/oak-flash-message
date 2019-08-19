<?php

namespace Tnt\FlashMessage\Events;

use Oak\Dispatcher\Event;
use Tnt\FlashMessage\Message;

class Notify extends Event
{
	/**
	 * @var Message $message
	 */
	private $message;

	/**
	 * Notify constructor.
	 * @param Message $mesage
	 */
	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	/**
	 * @return Message
	 */
	public function getMessage(): Message
	{
		return $this->message;
	}
}