<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABC</title>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <!-- Background image -->
        <div
          class="text-center bg-image d-block" alt="First silde"
          style="
            background-image: url('assets/frontend/Images/bgbanner1.jpg');
            width: 100%;
            padding: 230px 100px;
          "
        >
          <div class="mask p-5" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">COLLECTION AUTUMN</h1>
               <button type="button" class="btn btn-dark rounded-0 p-2">SHOP NOW</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
        </div>
        <div class="carousel-item">
          <!-- Background image -->
        <div
          class="text-center bg-image d-block" alt="Second silde"
          style="
            background-image: url('assets/frontend/Images/bgbanner2.jpg');
            width: 100%;
            padding: 230px 100px;
          "
        >
          <div class="mask p-5" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">COLLECTION WINTER</h1>
               <button type="button" class="btn btn-dark rounded-0 p-2">SHOP NOW</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
        </div>
        <div class="carousel-item">
          <!-- Background image -->
        <div
          class="text-center bg-image d-block" alt="Third silde"
          style="
           background-image: url('assets/frontend/Images/bgbanner3.jpg');
           width: 100%;
           padding: 230px 100px;
          "
        >
          <div class="mask p-5" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">COLLECTION SPRING</h1>
               <button type="button" class="btn btn-dark rounded-0 p-2">SHOP NOW</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
        </div>
        <div class="carousel-item">
          <!-- Background image -->
        <div
          class="text-center bg-image d-block" alt="Third silde"
          style="
           background-image: url('assets/frontend/Images/bgbanner4.jpg');
           width: 100%;
           padding: 230px 100px;
          "
        >
          <div class="mask p-5" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">COLLECTION SUMMER</h1>
               <button type="button" class="btn btn-dark rounded-0 p-2">SHOP NOW</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
  </header>
  <!-- end header -->
  <!-- start main -->
  <main class="mt-0">
    <?php echo $this->view; ?>
  </main>
  <div class="footer">
      <?php include "views/FooterView.php"; ?>
  </div>
</body>
<script type="text/javascript" src="assets/frontend/Lib/jquery.min.js"></script>
<script type="text/javascript" src="assets/frontend/Lib/bootstrap4/popper.min.js"></script>
<script type="text/javascript" src="assets/frontend/Lib/bootstrap4/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/frontend/Js/homepage.js"></script>
</html>