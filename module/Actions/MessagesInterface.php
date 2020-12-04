<?php

namespace App;

interface MessagesInterface {

	/**
	 * This method return TRUE if message was added and return FALSE if not.
	 *
	 * @param string $name
	 * @param string $email
	 * @param string $message
	 *
	 * @return bool
	 */
	public function addMessage(string $name, string $email, string $message): bool;

	/**
	 * This method returns array of all messages from database.
	 *
	 * @return array
	 */
	public function getMessage(): array;

}