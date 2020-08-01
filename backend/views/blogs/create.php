<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 8:54 AM
 */
?>

<h3>Thêm mới Blog</h3>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_category_id">Chọn danh mục Blog</label>
        <select name="blog_category_id"
                class="form-control"
                id="blog_category_id"
        >
            <?php
            foreach ($blog_categories AS $blog_category):
                $selected = '';
                if(isset($_POST['blog_category_id']) && $blog_category['id'] == $_POST['blog_category_id']){
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $blog_category['id'];?>"
                    <?php echo $selected; ?>
                >
                    <?php echo $blog_category['name'];?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
               id="title"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="title">Tags</label>
        <input type="text" name="tags"
               value="<?php echo isset($_POST['tags']) ? $_POST['tags'] : ''; ?>"
               id="tags"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh</label>
        <input type="file"
               name="avatar"
               id="avatar"
               value=""
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn</label>
        <textarea class="form-control"
                  name="summary"
                  id="summary"
        ><?php echo isset($_POST['summary']) ? $_POST['summary'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Nội dung</label>
        <textarea class="form-control"
                  name="content"
                  id="content"
        ><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=blog&action=index"
           class="btn btn-default">Back</a>
    </div>
</form>
