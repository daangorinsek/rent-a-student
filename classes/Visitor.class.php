<?php

class Visitor {
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($visitor = null) {
		$this->_db = Db::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$visitor) {
			if (Session::exists($this->_sessionName)) {
				$visitor = Session::get($this->_sessionName);
				if ($this->find($visitor)) {
					$this->_isLoggedIn = true;
				} else {
					//logout
				}
			}
		} else {
			$this->find($visitor);
		}
	}

	public function update($fields = array(), $id = null) {
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if (!$this->_db->update('visitors', $id, $fields)) {
			throw new Exception('There was a problem updating your information');
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('visitors', $fields)) {
			throw new Exception('There was a problem creating an account');
		}
	}	

	public function find($visitor = null) {
		if($visitor) {
			$field = (is_numeric($visitor)) ? 'id' : 'visitorname';
			$data = $this->_db->get('visitors', array($field, '=', $visitor));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
			return false;
		}
	}

	public function login($visitorname = null, $password = null, $remember = false) {
		if (!$visitorname && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$visitor = $this->find($visitorname);
			if ($visitor) {
				if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->id);
					if ($remember) {
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('visitor_sessions', array('visitor_id', '=', $this->data()->id));
						if (!$hashCheck->count()) {
							$this->_db->insert('visitor_sessions', array(
								'visitor_id' => $this->data()->id,
								'hash' => $hash
							));
						} else {
							$hash = $hashCheck->first()->hash;
						}
						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}
					return true;
				}
			}
		
		}
		return false;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function logout() {
		$this->_db->delete('visitor_sessions', array('visitor_id', '=', $this->data()->id));
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data() {
		return $this->_data;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}

?>