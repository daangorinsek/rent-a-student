<?php

	class Db {
		private static $db;
		public static function getInstance() {
			if (self::$db === null) {
				//echo "new connection";
				self::$db = new PDO('mysql:host=localhost; dbname=rent_a_student', "root", "");
				return self::$db;
			} else {
				//echo "same connection";
				return self::$db;
			}
		}
	}

?>