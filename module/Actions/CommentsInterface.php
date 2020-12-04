<?php

namespace App;

interface CommentsInterface{

	/**
	 * This method return TRUE if comment was added and return FALSE if not.
	 *
	 * @param $name
	 * @param $message
	 *
	 * @return bool
	 */
	public function addComment($name, $message): bool;

	/**
	 * This method return TRUE if comment was edited and return FALSE if not.
	 *
	 * @param $id
	 * @param $message
	 *
	 * @return bool
	 */
	public function editComment($id, $message): bool;

	/**
	 * This method returns array of all comments.
	 *
	 * @return array
	 */
	public function getComments(): array;

}
