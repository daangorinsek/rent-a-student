<?php

class Comment {
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($comment = null) {
		$this->_db = Db::getInstance();
	}

	public function update($fields = array(), $id = null) {
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if (!$this->_db->update('comments', $id, $fields)) {
			throw new Exception('There was a problem updating your information');
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('comments', $fields)) {
			throw new Exception('There was a problem creating an comment');
		}
	}

	public function find($comment = null) {
		if($comment) {
			$field = (is_numeric($comment)) ? 'id' : 'commentname';
			$data = $this->_db->get('comments', array($field, '=', $comment));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
			return false;
		}
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function data() {
		return $this->_data;
	}

}
?>