<?php
?>
<h2>Thêm mới sản phẩm</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_category_id">Chọn danh mục sản phẩm</label>
        <select name="product_category_id"
                class="form-control"
                id="product_category_id"
        >
            <option value="">Product Categories</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Nhập tên sản phẩm</label>
        <input type="text" name="title"
               value=""
               id="title"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="quantity">Nhập số lượng</label>
        <input type="number"
               name="quantity"
               id="quantity"
               value=""
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
               value=""
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn cho sản phẩm</label>
        <textarea class="form-control"
                  name="summary"
                  id="summary"
        ></textarea>
    </div>
    <div class="form-group">
        <label for="content">Mô tả chi tiết cho sản phẩm</label>
        <textarea class="form-control"
                  name="content"
                  id="content"
        ></textarea>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status"
                id="status"
                class="form-control"
        >
            <option value="">Active</option>
            <option value="">Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
    </div>
</form>
