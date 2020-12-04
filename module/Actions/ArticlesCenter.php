<?php

namespace App;

use Exception;
use PDO;

require_once "ArticlesInterface.php";
require_once "MySQLdatabase.php";

class ArticlesCenter extends MySQLdatabase implements ArticlesInterface {



	public function connect() {
		return parent::connect();
	}


	/**
	 * {@inheritdoc }
	 */
	public function addArticles(string $title, string $description):bool {
		$pdo = $this->connect();
		$dt = date("Y-M-d H:i:s");
		$sql = "INSERT INTO article(Title,Description,Date) VALUES('$title', '$description', '$dt')";
		$statment = $pdo->query($sql);
		if(!$statment)
			return FALSE;
		return TRUE;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getArticleList():array {
		$pdo = $this->connect();
		$sql = "SELECT id, title, description, date FROM article ORDER BY id DESC LIMIT 5";
		$statment = $pdo->query($sql);
		$data = $statment->fetchAll(PDO::FETCH_ASSOC);
		if(!$data)
			throw new Exception("Can't get list of 5 last articles");
		return $data;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getArticle():array {
		$pdo = $this->connect();
		$sql = ("SELECT id, title, description, date FROM article ORDER BY id DESC");
		$statment = $pdo->query($sql);
		$data = $statment->fetchAll(PDO::FETCH_ASSOC);
		if(!$data)
			throw new Exception("Can't get list of all articles");
		return $data;
	}

	/**
	 * {@inheritdoc }
	 */
	public function selectArticle(int $id):array {
		$pdo = $this->connect();
		$sql = "SELECT * FROM article WHERE id = $id";
		$statment = $pdo->query($sql);
		$data = $statment->fetchAll(PDO::FETCH_ASSOC);
		if(!$data)
			throw new Exception("Can't return recent article!");
		return $data;
	}


}