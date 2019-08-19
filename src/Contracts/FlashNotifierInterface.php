<?php

namespace Tnt\FlashMessage\Contracts;

interface FlashNotifierInterface
{
	/**
	 * @param string $message
	 * @param string $type
	 */
	public function message(string $message, string $type = 'info');

	/**
	 * @param string $message
	 */
	public function success(string $message);

	/**
	 * @param string $message
	 */
	public function error(string $message);

	/**
	 * @param string $message
	 */
	public function warning(string $message);

	/**
	 * Get the messages
	 * @return array
	 */
	public function getMessages(): array;
}