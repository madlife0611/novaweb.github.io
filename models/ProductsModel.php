<?php 
	trait ProductsModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			$category_id =isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			$sqlOrder = "";
			$order = isset($_GET["order"]) ? $_GET["order"] : "";
			switch ($order) {
				case 'priceAsc':
					$sqlOrder = "order by price asc";
					break;
				case 'priceDesc':
					$sqlOrder = "order by price desc";
					break;
				case 'nameAsc':
					$sqlOrder = "order by name asc";
					break;
				case 'nameDesc':
					$sqlOrder = "order by name desc";
					break;
				default:
					$sqlOrder = "order by id desc";
					break;
			}
			//--
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where category_id in (select id from categories where id=$category_id or parent_id=$category_id) $sqlOrder limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			$category_id =isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from products where category_id = $category_id");
			//tra ve so luong ban ghi
			return $query->rowCount();
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
		public function modelGetSameProduct(){
			$db = Connection::getInstance();
			$query = $db->query("select * from products where discount >= 25 limit 0,3");
			return $query->fetchAll();
		}
		// //set so sao san pham
		// public function modelRating(){
		// 	$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
		// 	$star = isset($_GET["star"]) && $_GET["star"] > 0 ? $_GET["star"] : 0; 
		// 	if($star > 0 && $id > 0){
		// 		//lay bien ket noi csdl
		// 		$db = Connection::getInstance();
		// 		$db->query("insert into rating(product_id,star) values($id,$star)");
		// 	}
		// }
		// //lay so sao de hien thi
		// public function modelGetStar($product_id,$star){
		// 	//lay bien ket noi csdl
		// 	$db = Connection::getInstance();
		// 	$query = $db->query("select id from rating where product_id=$product_id and star=$star");
		// 	//tra ve so luong ban ghi
		// 	return $query->rowCount();
		// }
	}
 ?>