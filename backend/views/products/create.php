<?php
?>
<h3>Thêm mới sản phẩm</h3>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_category_id">Chọn danh mục sản phẩm</label>
        <select name="product_category_id"
                class="form-control"
                id="product_category_id"
        >
            <?php
            foreach ($product_categories AS $product_category):
            $selected = '';
            if(isset($_POST['product_category_id']) && $product_category['id'] == $_POST['product_category_id']){
                $selected = 'selected';
            }
            ?>
            <option value="<?php echo $product_category['id'];?>"
                    <?php echo $selected; ?>
            >
                <?php echo $product_category['name'];?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Nhập tên sản phẩm</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
               id="title"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="quantity">Nhập số lượng</label>
        <input type="number"
               name="quantity"
               id="quantity"
               value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh sản phẩm</label>
        <input type="file"
               name="avatar"
               id="avatar"
               value=""
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="price">Nhập giá</label>
        <input type="number"
               name="price"
               id="price"
               value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn cho sản phẩm</label>
        <textarea class="form-control"
                  name="summary"
                  id="summary"
        ><?php echo isset($_POST['summary']) ? $_POST['summary'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Mô tả chi tiết cho sản phẩm</label>
        <textarea class="form-control"
                  name="content"
                  id="content"
        ><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="product" class="btn btn-default">Back</a>
    </div>
</form>
