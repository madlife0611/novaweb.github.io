<?php 
  //load file LayoutTrangChu.php vao day
  $this->fileLayout = "LayoutTrangChu.php";
 ?>
<script type="text/javascript">
        //countDown
        var countDownDate = new Date("Jun 30, 2022 12:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          document.getElementById("days").innerHTML = days;
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("days").innerHTML = "EXPIRED";
          }
          document.getElementById("hours").innerHTML = hours;
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("hours").innerHTML = "EXPIRED";
          }
          document.getElementById("minutes").innerHTML = minutes;
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("minutes").innerHTML = "EXPIRED";
          }
          document.getElementById("seconds").innerHTML = seconds;
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("seconds").innerHTML = "EXPIRED";
          }
          document.getElementById("endIn").innerHTML = days;
        }, 1000);
</script>
  <div class="flash_sale mb-3">
      <div class="card">
          <div class="card-header border-0 row" id="headingOne" style="position: relative; padding: 20px;">
            <div class="countdown-title d-flex col-sm mt-2 ml-3">
                <div class="dateCounter">
                  <span class="countdown">
                      <span class="time" id="days"></span>
                  </span>
                  <span class="countdown">
                      <span class="time" id="hours"></span>
                  </span>
                  <span class="countdown">
                      <span class="time" id="minutes"></span>
                  </span>
                  <span class="countdown">
                      <span class="time" id="seconds"></span>
                  </span>
                </div>
                <span class="text-countdown" style="color: black;">Kết thúc sau <span id="endIn"></span> ngày</span>
            </div>
            <div class="col-sm">
              <h2 class="index-title mb-0 text-center">
                <a href="#" style="line-height: 50px; color: #1b1b1b; font-weight: 700">
                  Flash Sale
                </a>
              </h2>
              <div class="text-center"><img src="assets/frontend/Images/line1.png" style="width: 380px;"></div>
            </div>
            <div class="col-sm">
              <h4 class="index-title mb-0 text-center mt-2">
                <a href="index.php?controller=sales" style="line-height: 50px; color: #1b1b1b; font-weight: 600; float: right;">
                  Xem tất cả >>>
                </a>
              </h4>
            </div>
          </div>
          <div class="card-deck" >
            <?php 
              $flashSale = $this->modelFlashSale();
            ?>
            <?php foreach($flashSale as $rows): ?>
            <div class="box">
              <div class="product-grid">
                <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img class="card-img-top" src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>"></a> </div>
                <span class="discountOnImg"><?php echo $rows->discount; ?>%</span>
                  <div class="description ">
                    <h5 class="name card-title"><a  style="color: #1b1b1b; text-decoration: none;" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h5>
                  <div class="product-cost d-flex justify-content-center mt-2">
                    
                    <p class="price-box card-text text-danger mt-2 ml-2"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
                    <p class="price-box card-text mt-2 ml-2"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                  </div>
                    <form class="action-btn">
                      <div class="icon-product">
                        <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><i class="fas fa-eye"></i></a>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
      </div>
  </div>
  <!-- HOT Products -->
    <div class="products">
      <div id="accordion">
        <div class="card">
          <div class="card-header border-0" id="headingOne">
            <h2 class="index-title mb-0 text-center">
              <a href="index.php?controller=hotProducts" style="line-height: 50px; color: #1b1b1b; font-weight: 700;">
                Hot Products
              </a>
            </h2>
            <div class="text-center"><img src="assets/frontend/Images/line1.png" style="width: 380px;"></div>
          </div>

          <div id="collapseOne">
            <div class="card-body">
              <div class="card-deck">
                <?php 
                $hotProduct = $this->modelHotProduct();
               ?>
               <?php foreach($hotProduct as $rows): ?>
                <!-- box product -->
                
                <div class="box">
                  <div class="product-grid" id="product-1168979">
                    <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img class="card-img-top" src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>"></a> </div>
                    <span class="discountOnImg"><?php echo $rows->discount; ?>%</span>
                      <div class="description ">
                        <h5 class="name card-title"><a  style="color: #1b1b1b; text-decoration: none;" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h5>
                      <div class="product-cost d-flex justify-content-center mt-2">
                        
                        <p class="price-box card-text text-danger mt-2 ml-2"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
                        <p class="price-box card-text mt-2 ml-2"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                      </div>
                        <form class="action-btn">
                          <div class="icon-product">
                            <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><i class="fas fa-eye"></i></a>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
                <!-- end box product -->
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /HOT Products -->
  <!-- Sản phẩm mới -->
    <div class="container-fluid">
      <div class="card-header border-0" id="headingOne">
        <h2 class="index-title mb-0 text-center">
          <a href="#" style="line-height: 50px; color: #1b1b1b; font-weight: 700;">
                New Products
          </a>
        </h2>
        <div class="text-center">
          <img src="assets/frontend/Images/line1.png" style="width: 380px;">
        </div>
      </div>
      <div class="banner-collection right-side">
        <div class="banner-effect">
          <img src="assets/frontend/Images/NewProducts.jpg" sizes="737px">
        </div>
        <div class="">
          
        </div>
      </div>
      <div class="box-collection left-side d-flex">
        <?php $newProduct = $this->modelNewProduct() ?>
        <?php foreach($newProduct as $rows): ?>
        <div class="box">
          <div class="product-grid" style="border-radius: 40px;">
            <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img class="card-img-top" src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>"></a> </div>
            <span class="discountOnImg"><?php echo $rows->discount; ?>%</span>
            <div class="new-description text-center">
              <h5 class="name card-title"><a  style="color: #1b1b1b; text-decoration: none;" href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h5>
              <div class="product-cost d-flex justify-content-center mt-2">
                <p class="price-box card-text text-danger mt-2 ml-2"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
                <p class="price-box card-text mt-2 ml-2"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
              </div>
              <form class="action-btn">
                <div class="icon-product">
                  <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                  <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><i class="fas fa-eye"></i></a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- Collections -->
      <div class="card">
            <div class="card-header border-0" id="headingOne">
              <h2 class="index-title mb-0 text-center">
                <a href="index.php?controller=news" style="line-height: 50px; color: #1b1b1b; font-weight: 700">
                  Bản tin
                </a>
              </h2>
              <div class="text-center"><img src="assets/frontend/Images/line1.png" style="width: 380px;"></div>
            </div>

            <div class="collection">
              <div class="card-body">
                <div class="card-deck">
                  <?php 
                    $news = $this->modelHotNews();
                   ?>
                   <?php foreach($news as $rows): ?>
                    <div class="box">
                      <div class="product-grid pb-2">
                        <div class="image"> <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>"><img class="card-img-top" src="assets/upload/news/<?php echo $rows->photo; ?>" ></a> </div>
                          <div class="new-description text-center mt-3">
                            <h4 class=""><a  style="color: #1b1b1b; text-decoration: none; font-weight: 600" href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h4>
                          </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  
                </div>
              </div>
          </div>
          <!-- /hotnews --> 
          <style type="text/css">
            a:hover{
              text-decoration: none;
              color: #1b1b1b;
            }
          </style>