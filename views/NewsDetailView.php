<?php 
	//--
	$this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="container pt-3">
 	<h3><?php echo $record->name; ?></h3>
 	<img src="assets/upload/news/<?php echo $record->photo; ?>" style="width: 100%;">
 	<p><?php echo $record->description; ?></p>
 	<p><?php echo $record->content; ?></p>
 </div>