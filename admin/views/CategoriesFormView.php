<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
<!-- <script type="text/javascript">
    
    function getValue(id){
        return document.getElementById(id).value.trim();
    }

    // Hiển thị lỗi
    function showError(key, mess){
        document.getElementById(key + '_error').innerHTML = mess;
    }

    function validate()
    {
        var flag = true;

        // 1 username
        var name = getValue('name');
        if (name == '' || name.length > 50 || !/^[a-zA-Z0-9]+$/.test(name)){
            flag = false;
            showError('name', 'Vui lòng kiểm tra lại tên danh mục');
        }
        return flag;
    }

</script> -->
 <div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit category</div>
        <div class="panel-body">
        <form name="form1" method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-6">
                    <input type="text" name="name" value="<?php echo isset($record->name) ? $record->name : ""; ?>" class="form-control" required>
                </div>
                <div class="col-md-4"> 
                    <p id="name_error" name="name_error" style="color: red ;font-weight: bold; size: 20px;"> </p>
                </div>
                
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Parent</div>
                <div class="col-md-10">
                    <?php 
                        $category_id = isset($record->id) ? $record->id : 0;
                        $categories = $this->modelCategories($category_id);
                     ?>
                    <select name="parent_id" class="form-control" style="width:250px;">
                        <option value="0"></option>
                        <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->id) && $record->parent_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input name="process" type="submit"  value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        
        </div>
    </div>
</div>