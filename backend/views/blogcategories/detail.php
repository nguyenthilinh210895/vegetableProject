<h1>Chi tiết Blog Categories <?php echo $blog_category['id'];?></h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created_at</th>
        <th>Updated_at</th>
    </tr>
    <?php
    if(!empty($blog_category)):
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

            </tr>
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
<a href="index.php?controller=blogcategory&action=index" class="btn btn-primary">Quay lại</a>
<!--  hiển thị phân trang-->