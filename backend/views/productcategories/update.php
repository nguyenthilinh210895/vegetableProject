<?php
if(empty($product_category)):
?>
<h2>Danh mục không tồn tại</h2>
<?php
else:
?>
<h2>Chỉnh sửa danh mục #<?php echo $product_category['id']; ?> </h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $product_category['name']; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control"
                  name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $product_category['description']; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    <br/>
    <a href="index.php?controller=productcategory&action=index"
       class="btn btn-info"
    >Hủy</a>
</form>
<?php endif; ?>