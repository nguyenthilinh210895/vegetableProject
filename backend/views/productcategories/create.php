<?php
?>

<h2>Thêm mới danh mục sản phẩm</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control"
                  name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    <br/>
    <a href="index.php?controller=productcategory&action=index"
       class="btn btn-info"
    >Quay lại</a>
</form>