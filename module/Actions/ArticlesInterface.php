<?php

namespace App;

interface ArticlesInterface {

	/**
	 * This method returns TRUE if article was added and return FALSE if not.
	 *
	 * @param string $title
	 * @param string $description
	 *
	 * @return bool
	 */
	public function addArticles(string $title, string $description): bool;

	/**
	 * This method returns array of 3 last articles from database. Use on title page.
	 *
	 * @return array
	 */
	public function getArticleList(): array;

	/**
	 * This method returns array of all articles from database.
	 *
	 * @return array
	 */
	public function getArticle(): array;

	/**
	 * This method returns article from database by ID.
	 *
	 * @param int $id
	 *
	 * @return array
	 */
	public function selectArticle(int $id): array;


}