<?php 
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="card-header bg-dark">
    <div class="row">
      <div class="col-md-3">

          <a href="#" style="line-height: 50px; color: #fff; font-weight: 700; font-size:20px;">
            Hot Products
          </a>

      </div>
      <div class="col-md-6">
        
      </div>
      <div class="col-md-3 mt-2">
        <?php 
          $order = isset($_GET["order"]) ? $_GET["order"] : "";
         ?>
        <select class="form-control" onchange="location.href = 'index.php?controller=hotProducts&action=category&id=<?php echo $category_id; ?>&order='+this.value;">
          <option value="0">Sắp xếp</option>
          <option <?php if($order == "priceAsc"): ?> selected <?php endif; ?> value="priceAsc">Giá tăng dần</option>
          <option <?php if($order == "priceDesc"): ?> selected <?php endif; ?> value="priceDesc">Giá giảm dần</option>
          <option <?php if($order == "nameAsc"): ?> selected <?php endif; ?> value="nameAsc">Sắp xếp A-Z</option>
          <option <?php if($order == "nameDesc"): ?> selected <?php endif; ?> value="nameDesc">Sắp xếp Z-A</option>
        </select>
      </div>
    </div> 
  </div>
  <div class="card-products">
    <div class="card-deck">
      <?php 
      $hotProduct = $this->modelHotProducts();
      ?>
      <?php foreach($hotProduct as $rows): ?>
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


 