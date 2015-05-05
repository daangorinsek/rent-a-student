<?php

	include_once("Db.class.php");

	class Student {
		private $m_sEmail;
		private $m_sPassword;
		private $m_sFirstname;
		private $m_sLastname;
		private $m_sPhotoUrl;
		private $m_sCity;
		private $m_sAbout;
		private $m_sDesOrDev;
		private $m_sGrade;

		public function __set($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
				case 'Email':
					if ($p_vValue != "") {
						$this->m_sEmail = $p_vValue;	
					} else {
						throw new Exception("Email is required.");
					}
					break;
				case 'Password':
					if ($p_vValue != "") {
						$this->m_sPassword = $p_vValue;
					} else {
						throw new Exception("Password is required.");
					}
					break;
				case 'Firstname':
					if ($p_vValue != "") {
					$this->m_sFirstname = $p_vValue;
					} else {
						throw new Exception("Firstname is required.");
					}
					break;
				case 'Lastname':
					if ($p_vValue != "") {
					$this->m_sLastname = $p_vValue;
					} else {
						throw new Exception("Lastname is required.");
					}
					break;
				case 'PhotoUrl':
					$this->m_sPhotoUrl = $p_vValue;
					break;
				case 'City':
					if ($p_vValue != "") {
					$this->m_sCity = $p_vValue;
					} else {
						throw new Exception("City is required.");
					}
					break;
				case 'About':
					$this->m_sAbout = $p_vValue;
					break;
				case 'DesOrDev':
					if ($p_vValue != "") {
					$this->m_sDesOrDev = $p_vValue;
					} else {
						throw new Exception("Course is required.");
					}
					break;
				case 'Grade':
					if ($p_vValue != "") {
					$this->m_sGrade = $p_vValue;
					} else {
						throw new Exception("Grade is required.");
					}
					break;
			}
		}

		public function __get($p_sProperty) {
			switch ($p_sProperty) {
				case 'Email':
					return($this->m_sEmail);
					break;
				case 'Password':
					return($this->m_sPassword);
					break;
				case 'Firstname':
					return($this->m_sFirstname);
					break;
				case 'Lastname':
					return($this->m_sLastname);
					break;
				case 'PhotoUrl':
					return($this->m_sPhotoUrl);
					break;
				case 'City':
					return($this->m_sCity);
					break;
				case 'About':
					return($this->m_sAbout);
					break;
				case 'DesOrDev':
					return($this->m_sDesOrDev);
					break;
				case 'Grade':
					return($this->m_sGrade);
					break;
			}
		}
/*
		public function SignUp() {
			$conn = Db::getInstance();
			$statement = $conn->prepare('INSERT INTO tbl_students (student_mail, student_password) VALUES ( :email, :password)');
			$statement->bindValue(':email', $this->Email);
			$statement->bindValue(':password', $this->Password);
			$statement->execute();
		}
*/
		public function SignUp() {
			$conn = Db::getInstance();
			$statement = $conn->prepare('INSERT INTO tbl_students (student_mail, student_password, student_firstname, student_lastname, student_city, student_desdev, student_grade) VALUES (:email, :password, :firstname, :lastname, :city, :desdev, :grade)');
			$statement->bindValue(':email', $this->Email);
			$statement->bindValue(':password', $this->Password);
			$statement->bindValue(':firstname', $this->Firstname);
			$statement->bindValue(':lastname', $this->Lastname);
			$statement->bindValue(':city', $this->City);
			$statement->bindValue(':desdev', $this->DesOrDev);
			$statement->bindValue(':grade', $this->Grade);
			$statement->execute();
		}

		public function GetAll() {
			$conn = Db::getInstance();
			$allStudents = $conn->query('SELECT * FROM tbl_students');
			return $allStudents;
		}
	}

?>