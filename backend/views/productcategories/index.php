<!--
views/categories/index.php
Thông thường chức năng tìm kiếm trong backend sẽ nằm chung
với trang liệt kê
Form tìm kiếm thì sẽ ở phương thức GET
-->
<h2>Form tìm kiếm</h2>
<form action="" method="GET">
    <!--
      Nếu form sử dụng phương thức GET, cần chú ý phải thêm
      2 input có thuộc tính name tương ứng là controller và action,
      vì phương thức GET sẽ đổ dữ liệu của thuộc tính name của input
      trong form lên URL, dẫn đến mất 2 tham số controller và action
      mặc định của URL
      -->
    <input type="hidden" name="controller" value="category" />
    <input type="hidden" name="action" value="index" />
    <div class="form-group">
        <!--    Thẻ label dùng để kết hợp với input để tạo ra hiệu ứng
            click vào label -> trỏ chuột input
            -->
        <label for="name">Nhập name:</label>
        <input type="text" id="name" name="name"
               value=""
               class="form-control" />
    </div>
    <div class="form-group">

        <label for="status">Chọn trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="0"  >
                Disabled
            </option>
            <option value="1"  >
                Active
            </option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Search"
               class="btn btn-success" />
        <a class="btn btn-default"
           href="index.php?controller=category&action=index">
            Xóa filter
        </a>
    </div>
</form>

<h1>Danh sách Product Categories</h1>
<a href="index.php?controller=productcategory&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php
    if(!empty($product_categories)):
        ?>
        <?php
        foreach ($product_categories AS $product_category):
            ?>
            <tr>
                <td>
                    <?php echo $product_category['id']; ?>
                </td>
                <td>
                    <?php echo $product_category['name']; ?>
                </td>
                <td>
                    <?php echo $product_category['description']; ?>
                </td>
                <td>
                    <?php echo $product_category['created_at']; ?>
                </td>
                <td>
                    <?php echo $product_category['updated_at']; ?>
                </td>
                <td>
                    <a href="index.php?controller=productcategory&action=detail&id=<?php echo $product_category['id']; ?>"
                       title="Chi tiết">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="index.php?controller=productcategory&action=update&id=<?php echo $product_category['id']; ?>"
                       title="Sửa">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="index.php?controller=productcategory&action=delete&id=<?php echo $product_category['id']; ?>"
                       title="Xóa"
                       onclick="return confirm('Are you sure?')"
                    >
                        <i class="fa fa-trash"></i>
                    </a>

                </td>

            </tr>
        <?php
        endforeach;
        ?>
    <?php
    else:
        ?>
        <tr>
            <td colspan="6">
                Không có bản ghi nào
            </td>
        </tr>
    <?php endif; ?>
</table>

<!--  hiển thị phân trang-->


