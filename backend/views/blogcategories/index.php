<h2>Form tìm kiếm</h2>
<form action="" method="GET">
    <input type="hidden" name="controller" value="category" />
    <input type="hidden" name="action" value="index" />
    <div class="form-group">
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

<h1>Danh sách Blog Categories</h1>
<a href="index.php?controller=blogcategory&action=create" class="btn btn-primary">
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
    if(!empty($blog_categories)):
        ?>
        <?php
        foreach ($blog_categories AS $blog_category):
            ?>
            <tr>
                <td>
                    <?php echo $blog_category['id']; ?>
                </td>
                <td>
                    <?php echo $blog_category['name']; ?>
                </td>
                <td>
                    <?php echo $blog_category['description']; ?>
                </td>
                <td>
                    <?php echo $blog_category['created_at']; ?>
                </td>
                <td>
                    <?php echo $blog_category['updated_at']; ?>
                </td>
                <td>
                    <a href="index.php?controller=blogcategory&action=detail&id=<?php echo $blog_category['id']; ?>"
                       title="Chi tiết">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="index.php?controller=blogcategory&action=update&id=<?php echo $blog_category['id']; ?>"
                       title="Sửa">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="index.php?controller=blogcategory&action=delete&id=<?php echo $blog_category['id']; ?>"
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