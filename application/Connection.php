<?php 
	//ket noi csdl
	class Connection{
		//ham ket noi csdl, ket qua tra ve mot bien -> kieu bien nay la bien object
		public static function getInstance(){
			$db = new PDO("mysql:host=localhost;dbname=php_thuctap","root","");
			// $db = new PDO("sql104.byethost12.com;dbname=b12_31980982_php_thuctap","b12_31980982","minhnham4321");
			//lay du lieu theo kieu unicode
			$db->exec("set names utf8");
			//lay ket qua tra ve theo kieu object
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $db;
		}
	}
 ?>