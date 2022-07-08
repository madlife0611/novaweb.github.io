<?php 
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		public function __construct(){
			//kiem tra neu gio hang ton tai thi khoi tao no
			if(isset($_SESSION['cart']) == false)
				$_SESSION['cart'] = array();
		}
		//hien thi danh sach cac san pham trong gio hang
		public function index(){
			$this->loadView("CartView.php");
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model
			$this->cartAdd($id);
			header("location:index.php?controller=cart");
		}
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model
			$this->cartDelete($id);
			header("location:index.php?controller=cart");
		}
		public function destroy(){
			//goi ham trong model
			$this->cartDestroy();
			header("location:index.php?controller=cart");
		}
		//cap nhat so luong san pham
		public function update(){
			foreach($_SESSION['cart'] as $product){
				$name = "product_".$product["id"];
				$number = $_POST[$name];
				$this->cartUpdate($product["id"],$number);
			}
			header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			//kiem tra neu user chua dang nhap thi yeu cau dang nhap
			if(isset($_SESSION["customer_email"]) == false)
				header("location:index.php?controller=account&action=login");
			else{
				//goi ham cartCheckOut trong model
				$this->cartCheckOut();
				header("location:index.php?controller=cart");
			}
		}
	}
 ?>