<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="assets/frontend/Lib/bootstrap-5.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/frontend/css/homepage.css">
  <script src='assets/frontend/100/047/633/themes/517833/assets/jquery.min221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.js?1481775169361' type='text/javascript'></script>
  <script src='assets/frontend/assets/themes_support/api.jquerya87f.js?4' type='text/javascript'></script>
</head>
<body>
  <header>
    <!-- header -->
    <?php include "views/HeaderView.php"; ?>
    <!-- /header -->
  </header>
  <div style="width: 100%;"><img style="width: 100%;" src="assets/frontend/Images/Banner.jpg"></div>
  <main class="mt-0">
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" style="font-size: 20px; line-height: 50px; color: #fff; font-weight: 700;">Danh mục sản phẩm</a>
            <?php 
              //co the truy van truc tiep csdl va lay thong tin ra de hien thi o day
              $db = Connection::getInstance();
              $query = $db->query("select * from categories where parent_id=0 order by id desc");
              $categories = $query->fetchAll();
             ?>
             <?php foreach($categories as $rows): ?>
            <a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>" class="list-group-item list-group-item-action list-group-item-dark" style="font-weight: bold;"><?php echo $rows->name; ?></a>
            <?php 
              $querySub = $db->query("select * from categories where parent_id={$rows->id} order by id desc");
              $categoriesSub = $querySub->fetchAll();
             ?>
           <?php foreach($categoriesSub as $rowsSub): ?>
            <a href="index.php?controller=products&action=category&id=<?php echo $rowsSub->id; ?>" class="list-group-item list-group-item-action list-group-item-light" style="padding-left: 30px"><?php echo $rowsSub->name; ?></a>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </div>
          <div class="panel panel-default" style="margin-top:15px; border: 1px solid #ccc;">
            <div class="panel-heading bg-dark text-white p-2" style="font-size: 20px; line-height: 50px; color: #fff; font-weight: 700;"> Tìm theo mức giá </div>
            <div class="panel-body">
              <ul class="list-group" style="border:0px;">
                <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;
                  <input type="number" min="0" value="0" id="fromPrice" class="form-control" />
                </li>
                <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="number" min="0" value="0" id="toPrice" class="form-control"/>
                </li>
                <li class="list-group-item" style="border:0px; text-align:center">
                  <input type="button" class="btn btn-dark" value="Tìm mức giá" onclick="location.href = 'index.php?controller=search&action=price&fromPrice=' + document.getElementById('fromPrice').value + '&toPrice=' + document.getElementById('toPrice').value;" />
                </li>
              </ul>
            </div>
          </div>
          <div class="panel panel-default" style="margin-top:15px; border: 1px solid #ccc;">
            <div class="panel-heading bg-dark text-white p-2" style="font-size: 20px; line-height: 50px; color: #fff; font-weight: 700;"> Tìm theo khoảng giá </div>
            <div class="panel-body">
              <ul class="list-group" style="border:0px;">
                <li class="list-group-item" style="border:0px;">
                  <input type="checkbox" id="gia1" onclick="location.href='index.php?controller=search&action=price&fromPrice=0&toPrice=200000';"> <label for="gia1">Dưới 200,000</label>
                </li>
                <li class="list-group-item" style="border:0px;">
                  <input type="checkbox" id="gia2" onclick="location.href='index.php?controller=search&action=price&fromPrice=200000&toPrice=500000';"> <label for="gia2">Từ 200,000 đến 500,000</label>
                </li>
                <li class="list-group-item" style="border:0px;">
                  <input type="checkbox" id="gia3" onclick="location.href='index.php?controller=search&action=price&fromPrice=500000&toPrice=800000';"> <label for="gia2">Từ 500,000 đến 800,000</label>
                </li>
                <li class="list-group-item" style="border:0px;">
                  <input type="checkbox" id="gia4" onclick="location.href='index.php?controller=search&action=price&fromPrice=800000&toPrice=1000000';"> <label for="gia4">Từ 800,000 đến 1,000,000</label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <?php echo $this->view; ?>
        </div>
      </div>
    </div>
  </main>
  <div class="footer">
    
    <?php include "views/FooterView.php"; ?>

  </div>
</body>
<style type="text/css">
  .card-header{
    background-color: #343a40;
  }
</style>
<script type="text/javascript" src="assets/frontend/Lib/jquery.min.js"></script>
<script type="text/javascript" src="assets/frontend/Lib/bootstrap4/popper.min.js"></script>
<script type="text/javascript" src="assets/frontend/Lib/bootstrap4/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/frontend/Js/homepage.js"></script>
</html>