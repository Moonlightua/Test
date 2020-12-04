<?php

namespace App;

interface EmailsInterface {

	/**
	 * This method returns TRUE if email added successful and FALSE if not added.
	 *
	 * @param string $email
	 *
	 * @return bool
	 */
		public function addEmail(string $email): bool;

	/**
	 * This method returns array of all emails from database.
	 *
	 * @return array
	 */
		public function getEmails(): array;

}