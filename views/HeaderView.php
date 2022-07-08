    <div id="topbar">
      <div class="container d-flex justify-content-between">
        <div class="topbar d-flex ml-5">
          <div class="address mr-3">
            <button class="btn btn-dark">
              <a href="index.php?controller=contact">
              <i class="fal fa-map-marker-alt"></i>
              Địa chỉ
              </a>
            </button>  
          </div>
        </div>
        <div class="topbar d-flex mr-5">
          <div class="dropdown">
            <button class="btn btn-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fal fa-home-alt"></i>Tài khoản
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php if(isset($_SESSION["customer_email"])): ?>
              <a class="dropdown-item" href="index.php?controller=customersDetail">Thông tin cá nhân</a>&nbsp; &nbsp;
              <a class="dropdown-item" href="index.php?controller=account&action=logout">Đăng xuất</a>
              <?php else: ?>
              <a class="dropdown-item" href="index.php?controller=account&action=login">Đăng nhập</a>
              <a class="dropdown-item" href="index.php?controller=account&action=register">Đăng ký</a>
            <?php endif; ?>
            </div>
          </div>   
        </div>
      </div>
      
    </div>

    <div class="d-flex mt-2 mb-2 container justify-content-between">
      <div id="logo mt-2">
        <a class="logo d-block col-1" href="index.php">NOVA</a>
      </div>
      <div class="search d-flex mt-2 position-relative">
        <input type="text" autocomplete="off" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control form-control" style="width: 500px; height: 40px; ">
        <button style="background-color: #1b1b1b; color: white; height: 40px; width: 40px;" type="submit" class="btn" > <i class="fa fa-search" style="font-weight: 500;" id="btnSearch"></i> </button>
        <div class="smart-search">
          <ul>
            <li>
              <div><img src="http://localhost:8080/ThucTap/assets/upload/products/pl13.jpg"></div>
              <div><a href="#">Sản phẩm 1</a></div>
            </li>
            <li>
              <div><img src="http://localhost:8080/ThucTap/assets/upload/products/pl13.jpg"></div>
              <div><a href="#">Sản phẩm 2</a></div>
            </li>
            <li>
              <div><img src="http://localhost:8080/ThucTap/assets/upload/products/pl13.jpg"></div>
              <div><a href="#">Sản phẩm 3</a></div>
            </li>
          </ul>
        </div>
        <style type="text/css">
          .smart-search{position: absolute; width: 100%; margin-top: 50px; background: white; height: 350px; width: 500px; overflow: scroll; z-index: 10; display: none;}
          .smart-search ul{padding: 0px; margin-right: 50px; list-style: none;}
          .smart-search ul li{display: flex;}
          .smart-search img{width: 90px; margin-right: 5px;}
          .smart-search a{text-decoration: none; color: #1b1b1b; margin-top: 10px; font-size: 18px;}
        </style>
        <script type="text/javascript">
          //tinh nang nay phai dung ket hop voi jquery -> phai load thu vien jquery
      $(document).ready(function(){
        //bat su kien click cua id=btnSearch
        $("#btnSearch").click(function(){
          var key = $("#key").val();
          //di chuyen den url tim kiem
          location.href="index.php?controller=search&action=name&key="+key;
        });
        //---
        $(".input-control").keyup(function(){
          var strKey = $("#key").val();
          if(strKey.trim() == "")
            $(".smart-search").attr("style","display:none");
          else{
            $(".smart-search").attr("style","display:block");
            //---
            //su dung ajax de lay du lieu
            $.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
              //clear cac the li ben trong the ul
              $(".smart-search ul").empty();
              //them du lieu vua lay duoc bang ajax vao the ul
              $(".smart-search ul").append(data);
            });
            //---
          }
        });
        //---
      });
        </script>
      </div>
      <?php 
      $ProductNumberCart = 0;
      if(isset($_SESSION['cart']))
        foreach($_SESSION['cart'] as $product)
          $ProductNumberCart++;
     ?>
      <div class="cart mt-2">
        <a id="cart">
          <button class="btn btn-dark">
            <i class="far fa-shopping-cart"></i>
          </button>
          Giỏ hàng<span class="text-danger">(<?php echo $ProductNumberCart; ?>)</span>
        </a>
        
      </div>
    </div>

    <nav class="navbar d-flex" id="myNavbar">
      <div class="container">
        <ul class="nav nav-tabs  justify-content-center">
          <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
          <li class="nav-item dropdown-hover">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Danh mục sản phẩm
            </a>
            <div class="dropdown-menu dropdown-hover-menu" style="width: 226px;" aria-labelledby="navbarDropdown">
              <?php 
              //co the truy van truc tiep csdl va lay thong tin ra de hien thi o day
              $db = Connection::getInstance();
              $query = $db->query("select * from categories where parent_id=0 order by id desc");
              $categories = $query->fetchAll();
             ?>
             <?php foreach($categories as $rows): ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>" style="font-weight: bold;"><?php echo $rows->name; ?></a>
            <div class="dropdown-divider"></div>
                <?php 
                  $querySub = $db->query("select * from categories where parent_id={$rows->id} order by id desc");
                  $categoriesSub = $querySub->fetchAll();
                 ?>
               <?php foreach($categoriesSub as $rowsSub): ?>
                <a class="dropdown-item" href="index.php?controller=products&action=category&id=<?php echo $rowsSub->id; ?>" style="margin-left: 10px"><?php echo $rowsSub->name; ?></a>    
                <?php endforeach; ?>
            <?php endforeach; ?> 
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=news">Tin Tức</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=contact">Liên hệ</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=sales" style="color: red;">Flash Sale</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->
    <div class="show-cart">
      <div class="bg-dark" style="border: 1px solid #ccc;">
        <div class="row">
          <div class="col-md-11 pt-1 pb-1" >

              <a href="#" style="margin-left: 10px; line-height: 30px; color: #fff; font-weight: 600; font-size:16px;">
                Giỏ hàng
              </a>

          </div>
          <div class="col-md-1 p-1">
            <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <?php if(isset($_SESSION['cart'])): ?>
        <?php foreach($_SESSION['cart'] as $product): ?>
        <div class="cart-item d-flex p-2">
          <img src="assets/upload/products/<?php echo $product["photo"]; ?>">
          <div class="mt-5 ml-1">
            <span><?php echo $product["name"]; ?></span><br>
            <span ><strike><?php echo number_format($product["price"]); ?></strike> ₫</span><br>
            <span style="color:red"> <span> <?php echo number_format($product["price"] - ($product["price"] * $product["discount"])/100); ?> </span> ₫ </span>
            
          </div>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>
      
      <div class="p-2">
        <a class="btn btn-dark" href="index.php?controller=cart">Vào giỏ hàng</a>
      </div>
    </div>
    <style type="text/css">
      .sticky{
        position: fixed;
        top: 0;
        width: 100%;
      }
      .show-cart{
        position: fixed;  
        z-index: 10;
        top: 0;
        right: 0;
        width: 450px;
        height: 100vh;
        background-color: white;
        display: none;
      }
      .dropdown-hover-menu{
        display: none;
        position: absolute;
        z-index: 3;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
      }
      .dropdown-hover:hover .dropdown-hover-menu{
        display: block;
      }
      .cart-item span{
        font-size: 20px;
      }
      .cart-item img{
        width: 200px;
      }
    </style>
    <script type="text/javascript">
      window.onscroll = function() {myFunction()};

      var navbar = document.getElementById("myNavbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }
      }
      // Get all elements with class="close"
      var closebtns = document.getElementsByClassName("btn-close");
      var i;

      // Khi ấn close thì css show-cart display=none
      for (i = 0; i < closebtns.length; i++) {
        closebtns[i].addEventListener("click", function() {
          $('.show-cart').css('display', 'none');
        });
      }
      $('#cart').on('click', function(){
        $('.show-cart').css('display', 'block');
      });
    </script>
    <script type="text/javascript" src="assets/frontend/Lib/jquery.min.js"></script>