<?php

namespace App;

use Exception;
use PDO;

require_once "MySQLdatabase.php";
require_once "EmailsInterface.php";

class EmailsCenter extends MySQLdatabase implements EmailsInterface {


	public function connect() {
		return parent::connect();
	}

	/**
	 * {@inheritdoc }
	 */
	public function addEmail(string $email):bool {
		$pdo = $this->connect();
		$dt = date("Y-M-d H:i:s");
		$sql = "INSERT INTO emails(email,Date) VALUES('$email', '$dt')";
		$statment = $pdo->query($sql);
		if(!$statment)
			return FALSE;
		return TRUE;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getEmails():array {
		$pdo = $this->connect();
		$sql = "SELECT id, email, date FROM emails ORDER BY id DESC";
		$statment = $pdo->query($sql);
		$data = $statment->fetchAll(PDO::FETCH_ASSOC);
		if(!$data)
			throw new Exception("Can't get list of emails");
		return $data;
	}
}