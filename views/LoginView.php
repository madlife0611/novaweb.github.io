<?php 
  //load file LayoutTrangChu.php
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
<div class="container pt-3">
          <h1>Đăng nhập tài khoản</h1>
          <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
          <hr width="100%">
          <div class="row " style="margin-top:50px;">
            <div class="col-md-6">
              <div class="wrapper-form">
                <form method='post' action="index.php?controller=account&action=loginPost">
                  <p class="title text-center"><i>Đăng nhập tài khoản</i></p>
                  <div class="form-group">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Email:</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" name="email" required="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Mật khẩu:</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" name="password" required="">
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="button btn btn-dark" value="Đăng nhập">
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="wrapper-form">
                <p class="title text-center"><i>Tạo tài khoản mới</i></p>
                <p>Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
                <a href="index.php?controller=account&action=register" class="button btn btn-dark">Đăng ký</a>
              </div>
            </div>
          </div>
        </div>
