<?php
?>
    <!--form search-->
    <form action="" method="GET">
        <div class="form-group">
            <label for="title">Nhập title</label>
            <input type="text"
                   name="title"
                   value=""
                   id="title"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label for="title">Chọn danh mục</label>
            <select name="category_id" class="form-control">
                    <option value="option">
                    </option>
            </select>
        </div>
        <input type="hidden" name="controller" value="product"/>
        <input type="hidden" name="action" value="index"/>
        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
        <a href="index.php?controller=product" class="btn btn-default">Xóa filter</a>
    </form>


    <h2>Danh sách sản phẩm</h2>
    <a href="them-moi-san-pham" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product Category</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Avatar</th>
            <th>Summary</th>
            <th>Content</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th></th>
        </tr>
<!--        --><?php //echo $_SERVER['SCRIPT_NAME'];?>
        <?php

        if(!empty($products)):
        ?>
        <?php
            foreach ($products AS $product):
        ?>
            <tr>
                <td><?php echo $product['id'];?></td>
                <td><?php echo $product['product_category_name'];?></td>
                <td><?php echo $product['title'];?></td>
                <td><?php echo $product['quantity'];?></td>
                <td><?php echo number_format($product['price']);?></td>
                <td>
                    <?php if(!empty($product['avatar'])):?>
                    <img height="80px" src="assets/uploads/<?php echo $product['avatar']; ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $product['summary'];?></td>
                <td><?php echo $product['content'];?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at']));?></td>
                <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) :'--' ;?></td>
                <td>
                    <?php
                    $url_detail = "chi-tiet-san-pham/".$product['id'];
                    $url_update = "chinh-sua-san-pham/".$product['id'];
                    $url_delete = "xoa-san-pham/".$product['id'];
                    ?>
                    <a href="<?php echo $url_detail;?>" title="Chi tiết"><i class="fa fa-eye"></i> </a>
                    <a href="<?php echo $url_update;?>" title="Chỉnh sửa"><i class="fa fa-pencil"></i> </a>
                    <a href="<?php echo $url_delete;?>"
                       onclick="return confirm('Are you sure?')"
                       title="Xóa"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="11">No data found</td>
        </tr>
        <?php endif; ?>
    </table>