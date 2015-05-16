<?php

class Feedback {
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($feedback = null) {
		$this->_db = Db::getInstance();
	}

	public function update($fields = array(), $id = null) {
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if (!$this->_db->update('feedbacks', $id, $fields)) {
			throw new Exception('There was a problem updating your information');
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('feedbacks', $fields)) {
			throw new Exception('There was a problem creating an feedback');
		}
	}

	public function find($feedback = null) {
		if($feedback) {
			$field = (is_numeric($feedback)) ? 'id' : 'message';
			$data = $this->_db->get('feedbacks', array($field, '=', $feedback));

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