<?php

namespace App;

use Exception;

require_once "DeleteInterface.php";

class DeleteEntity implements DeleteInterface {

	const ARTICLE = 'App\ArticlesCenter';
	const EMAIL = 'App\EmailsCenter';
	const MESSAGE = 'App\MessagesCenter';

	/**
	 * {@inheritdoc}
	 */
	public function delete(int $id, string $class):bool {

		$pdo = new MySQLdatabase();
		$pdo = $pdo->connect();
		switch($class){
			case self::ARTICLE: $sql = "DELETE FROM article WHERE id = $id";
				break;
			case self::EMAIL: $sql = "DELETE FROM emails WHERE id = $id";
				break;
			case self::MESSAGE: $sql = "DELETE FROM msgs WHERE id = $id";
				break;
					default: throw new Exception('Wrong class!');
		}
		$statment = $pdo->query($sql);
		if (!$statment){
			return false;
		}
			return TRUE;
	}
}