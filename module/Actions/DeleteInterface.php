<?php

namespace App;

interface DeleteInterface {

	/**
	 * This method returns TRUE if entity was deleted and FALSE if not.
	 *
	 * @param int $id
	 *
	 * @return bool
	 */
	public function delete(int $id, string $class):bool;

}