<?php

namespace App;

use PDO;
use Exception;

require_once "MySQLdatabase.php";
require_once "MessagesInterface.php";
require_once "DeleteEntity.php";

class MessagesCenter extends MySQLdatabase implements MessagesInterface {

	public function connect() {
		return parent::connect();
	}

	/**
	 * {@inheritdoc }
	 */
	public function addMessage(string $name, string $email, string $message):bool {
		$pdo = $this->connect();
		$dt = date("Y-M-d H:i:s");
		$sql = "INSERT INTO msgs(name, email, message, Date) VALUES('$name','$email', '$message', '$dt')";
		$statment = $pdo->query($sql);
		if(!$statment)
			return FALSE;
		return TRUE;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getMessage():array {
		$pdo = $this->connect();
		$sql = "SELECT id, name, email, message, date FROM msgs ORDER BY id DESC";
		$statment = $pdo->query($sql);
		$data = $statment->fetchAll(PDO::FETCH_ASSOC);
		if(!$data)
			throw new Exception("Can't get list of 5 last articles");
		return $data;
	}
}