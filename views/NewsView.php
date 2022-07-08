<?php 
	//--
	$this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="card-header" style="background-color: #e9ecef;">
  <h2 class="card-title mb-0">
    <button class="btn btn-link">
      Tin tức
    </button>
  </h2>
</div>
      <div class="container-fluid pt-3">
        <div class="wrapper-blog"> 
          <!-- list news -->
          <div class="row">
            <?php foreach($data as $rows): ?>
            <div class="col-md-6 article"> <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="image"> <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive" style="width: 100%; height: 350px; overflow: hidden;" class="img-responsive"> </a>
              <h3><a class="text-dark" href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
              <p class="desc"><?php echo $rows->description; ?></p>
            </div>
        <?php endforeach; ?>
          </div>
          <!-- end list news --> 
          <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link bg-secondary text-dark" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for($i = 1; $i <= $numPage; $i++): ?>
                        <li class="page-item">
                        <a href="index.php?controller=news&p=<?php echo $i; ?>" class="page-link bg-secondary text-dark"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>    
                    <li class="page-item">
                        <a class="page-link text-dark bg-secondary" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
        </div>
      </div>
        