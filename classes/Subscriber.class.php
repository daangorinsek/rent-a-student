<?php

class Subscriber {
	private $_db, $_data;

	public function __construct($subscriber = null) {
		$this->_db = Db::getInstance();
	}

	public function update($fields = array(), $id = null) {
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if (!$this->_db->update('subscribers', $id, $fields)) {
			throw new Exception('There was a problem updating your information');
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('subscribers', $fields)) {
			throw new Exception('There was a problem creating an subscriber');
		}
	}

	public function find($subscriber = null) {
		if($subscriber) {
			$field = (is_numeric($subscriber)) ? 'id' : 'subscribername';
			$data = $this->_db->get('subscribers', array($field, '=', $subscriber));

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