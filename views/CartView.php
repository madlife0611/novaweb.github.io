<?php 
  //load file Layout.php vao day
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
<div class="">
  <form action="index.php?controller=cart&action=update" method="post">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th style="width:150px;">Ảnh sản phẩm</th>
            <th class="name">Tên sản phẩm</th>
            <th class="price">Giá bán lẻ</th>
            <th style="width:105px;" class="quantity">Số lượng</th>
            <th class="price" style="width:160px">Thành tiền</th>
            <th >Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($_SESSION['cart'] as $product): ?>
          <tr>
            <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" class="img-responsive" style="max-width: 150px;" /></td>
            <td><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a>
              </td>
            <td> <?php echo number_format($product["price"]-($product["price"]*$product["discount"])/100); ?>₫ </td>
            <td><input style="max-width: 80px;" type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
            <td><p><b><?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]); ?>₫</b></p></td>
            <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6">
              <a href="index.php?controller=cart&action=destroy&id=<?php echo $product["id"]; ?>" class="button pull-left btn btn-outline-dark">Xóa toàn bộ</a> 
              <input type="submit" class="button pull-right btn btn-outline-dark mr-2" value="Cập nhật">
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </form>
<style type="text/css">
td a{text-decoration: none; color: #1b1b1b; font-size: 18px;}
a:hover{text-decoration: none;}
input{font-size: 18px;}
td{font-size: 18px;}
</style>
</div>
<div class="">
  <div class="card">
    <div class="card-header">
      <?php if($this->cartNumber() > 0): ?>
      <p class="text-white"><b class="text-uppercase">Tóm tắt đơn hàng</b></p>
      <p class="text-white"><i>Chưa bao gồm phí vận chuyển:</i></p>
      <p class="text-white"><b> Tổng tiền:
        <?php echo number_format($this->cartTotal()); ?>₫ <br>
      </b></p>
    </div>
    <div class="card-body">
      <a href="index.php?controller=cart&action=checkout" class="btn btn-outline-dark">Thanh toán</a>
      <?php endif; ?>
      <a href="index.php" class="btn btn-outline-dark">Tiếp tục mua hàng</a>
    </div>
    
  </div>
</div>
          
