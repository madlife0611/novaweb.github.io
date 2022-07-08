<?php 
  //load file LayoutTrangChu.php
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
<div class="container pt-3">
          <h1>Đăng ký tài khoản</h1>
          <?php if(isset($_GET["notify"])&&$_GET["notify"]=="error"): ?>
          <p style="color:red;">Đăng ký chưa thành công, bạn hãy kiểm tra lại thông tin!</p>
          <?php else: ?>
          <p> Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
          <?php endif; ?>
          <hr width="100%">
          <div class="row" style="margin-top:50px;">
            <div class="col-md-6">
              <div class="wrapper-form">
                <form method='post' action="index.php?controller=account&action=registerPost">
                  <p class="title text-center"><i>Đăng ký tài khoản</i></p>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Họ và tên:</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="input-control form-control" required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                      <input type="text" name="email" class="input-control form-control" required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9">
                      <input type="text" name="address" class="input-control form-control" required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Điện thoại:</label>
                    <div class="col-sm-9">
                      <input type="text" name="phone" class="input-control form-control" required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mật khẩu:</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="input-control form-control" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="button btn btn-dark" value="Đăng ký">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="wrapper-form">
                <p class="title text-center"><i>Đăng nhập</i></p>
                <p>Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
                <a href="index.php?controller=account&action=login" class="button btn btn-dark">Đăng nhập</a> </div>
            </div>
          </div>
        </div>