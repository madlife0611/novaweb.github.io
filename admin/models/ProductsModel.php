<?php 
	trait ProductsModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products order by id desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//hien thi cac danh muc cap con
		public function modelCategoriesSub($category_id){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where parent_id = $category_id");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
		}
		//hien thi cac danh muc cap 0
		public function modelCategories(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where parent_id = 0");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetchAll();
		}
		//lay 1 ban ghi category
		public function getCategory($category_id){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from categories where id = $category_id");
			//tra ve tat ca cac ban ghi lay duoc tu cau truy van
			return $query->fetch();
		}

		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from products where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$discount = $_POST["discount"];
			$price = $_POST["price"];
			//update cot name
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update products set name = :var_name, category_id = :var_category_id, hot = :var_hot,discount = :var_discount,price = :var_price where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_category_id"=>$category_id,"var_hot"=>$hot,"var_discount"=>$discount,"var_price"=>$price]);	
			//---
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				//---
				//lay anh de xoa
				$oldPhoto = $db->query("select photo from products where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
						unlink("../assets/upload/products/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
				$query = $db->prepare("update products set photo=:var_photo where id=$id");
				$query->execute(['var_photo'=>$photo]);
			}
			//---
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$discount = $_POST["discount"];
			$price = $_POST["price"];
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
			}
			//---			
			//chuan bi truy van
			$query = $db->prepare("insert into products set name = :var_name, category_id = :var_category_id,hot = :var_hot,discount = :var_discount,price = :var_price,photo = :var_photo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_category_id"=>$category_id,"var_hot"=>$hot,"var_discount"=>$discount,"var_price"=>$price,"var_photo"=>$photo]);	
			
		}
		public function modelDelete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//---
			//lay anh de xoa
			$oldPhoto = $db->query("select photo from products where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch();
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
					unlink("../assets/upload/products/".$record->photo);
			}
			//---
			//chuan bi truy van
			$query = $db->prepare("delete from products where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>