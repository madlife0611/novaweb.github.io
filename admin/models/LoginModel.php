<?php 
	trait LoginModel{
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password -> ma hoa chuoi thanh doan ma 128 bit
			$password = md5($password);
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select email from users where email=:var_email and password=:var_password");
			//thuc thi truy van
			$query->execute(["var_email"=>$email,"var_password"=>$password]);
			//echo $query->rowCount();
			if($query->rowCount() > 0){
				//dang nhap thanh cong
				$_SESSION['email'] = $email;
				header("location:index.php");
			}else
				header("location:index.php?controller=login");
		}
	}
 ?>