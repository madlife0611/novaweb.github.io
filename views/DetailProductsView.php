<?php 
  //load file Layout.php vao day
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
<section class="py-5"  style="background-color: #fefefe; padding: 10px;">
    <div class="row col align-items-center d-flex flex-wrap">
      <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width: 50%;" class="img-responsive"/>
      <div class="col-md-6">
        <div class="mb-1">Mã sản phẩm: <?php echo $record->id; ?></div>
        <h3 class="display-5 fw-bolder"><?php echo $record->name; ?></h3>
        <div class="mt-1">Category: <?php 
                $category = $this->getCategory($record->category_id);
                echo isset($category->name) ? $category->name : "";
             ?></div>
        <div class="product-cost d-flex justify-content-start mt-2">  
          <p class="card-text mt-2 ml-2 mr-2 text-danger"><?php echo number_format($record->price - $record->price * $record->discount/100); ?><u>đ</u></p>
          <strike class="mt-2"><?php echo number_format($record->price); ?><u>đ</u></strike>
        </div>
       <!--  <h5>Màu sắc:</h5>
        <div class="select-color">               
          <div class="color-element d-inline-block position-relative mr-1 align-bottom" id="">
            <button type="button" class="btn btn-outline-dark"  style="background-color: <?php $record->color; ?>;">
            </button>
          </div>
        </div>
                        <h5 class="mt-2">Kích thước:</h5>
                        <div class="size-product d-flex flex-wrap ">
                          <button type="button" class="btn btn-outline-dark">
                            S
                          </button>
                          <button type="button" class="btn btn-outline-dark">
                            M
                          </button>
                          <button type="button" class="btn btn-outline-dark">
                            L
                          </button>
                          <button type="button" class="btn btn-outline-dark">
                            XL
                          </button>
                          <button type="button" class="btn btn-outline-dark">
                            XXL
                          </button>
                        </div> -->
                        <h5 class="mt-2">Số lượng:</h5>
        <div class="quantity-area btn-group" role="group" aria-label="Basic example">
          <button type="button" class="minus is-form btn btn-dark">-</button>
            <input type="text" id="quantity" name="quantity" value="1" min="1" class="input-qty text-center" max="127">
          <button type="button" class="plus is-form btn btn-dark">+</button>
        </div>
        <div class="mt-2">
          <button type="button" class="btn btn-dark">
            <a  style="color: #fff; text-decoration: none;" href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>">
              <i class="fal fa-cart-plus"></i>
              <span class="ml-1">Thêm vào giỏ hàng</span>
            </a>
              
          </button>
          <button type="button" class="btn btn-outline-dark">
                <i class="far fa-heart"></i><span class="ml-1">Thêm vào yêu thích</span>
          </button>
        </div>
        <div class="mt-4 d-flex">
              <span class="text-dark font-weight-bold">Chia sẻ: </span>
          <div class="ml-4">
                <!-- Facebook -->
                    <a class="fb-ic">
                      <i class="fab fa-facebook-f  mr-4 text-dark"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                      <i class="fab fa-twitter  mr-4 text-dark"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="gplus-ic">
                      <i class="fab fa-google-plus-g text-dark mr-4"> </i>
                    </a>
                    <!--Linkedin -->
                    <a class="li-ic">
                      <i class="fab fa-linkedin-in text-dark mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                      <i class="fab fa-instagram text-dark"> </i>
                    </a>
          </div>
        </div>
      </div>
    </div> 
    <!--  -->
    <hr>
    <div class="card-header bg-light">
      <a href="#" style="line-height: 50px; color: #000000; font-weight: 700; font-size:26px;">
        Các sản phẩm đang sale cực mạnh
      </a>
    </div>
    <div class="card-products">
    <div class="card-deck">
      <?php 
        $flashSale = $this->modelGetSameProduct();
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
</section>


