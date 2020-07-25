<h2>Cập nhật Blog Category #<?php echo $blog_category['id'];?></h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $blog_category['name']; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control"
                  name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $blog_category['description']; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    <br/>
    <a href="index.php?controller=blogcategory&action=index" class="btn btn-secondary">Back</a>
</form>