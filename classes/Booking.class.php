<?php

class Booking {
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($booking = null) {
		$this->_db = Db::getInstance();
	}

	public function update($fields = array(), $id = null) {
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if (!$this->_db->update('bookings', $id, $fields)) {
			throw new Exception('There was a problem updating your information');
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('bookings', $fields)) {
			throw new Exception('There was a problem creating an booking');
		}
	}

	public function find($booking = null) {
		if($booking) {
			$field = (is_numeric($booking)) ? 'id' : 'bookingname';
			$data = $this->_db->get('bookings', array($field, '=', $booking));

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