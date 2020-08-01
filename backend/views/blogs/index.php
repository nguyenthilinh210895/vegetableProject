<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 8:24 AM
 */
?>
<!--<form action="" method="GET">-->
<!--    <div class="form-group">-->
<!--        <label for="title">Nhập title</label>-->
<!--        <input type="text"-->
<!--               name="title"-->
<!--               value=""-->
<!--               id="title"-->
<!--               class="form-control"/>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="title">Chọn danh mục</label>-->
<!--        <select name="category_id" class="form-control">-->
<!--            <option value="option">-->
<!--            </option>-->
<!--        </select>-->
<!--    </div>-->
<!--    <input type="hidden" name="controller" value="product"/>-->
<!--    <input type="hidden" name="action" value="index"/>-->
<!--    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>-->
<!--    <a href="index.php?controller=product" class="btn btn-default">Xóa filter</a>-->
<!--</form>-->


<h2>Danh sách Blog</h2>
<a href="index.php?controller=blog&action=add" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Blog Category</th>
        <th>Title</th>
        <th>Tags</th>
        <th>Avatar</th>
        <th>Summary</th>
        <th>Content</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php

    if(!empty($blogs)):
        ?>
        <?php
        foreach ($blogs AS $blog):
            ?>
            <tr>
                <td><?php echo $blog['id'];?></td>
                <td><?php echo $blog['name'];?></td>
                <td><?php echo $blog['title'];?></td>
                <td><?php echo $blog['tags'];?></td>
                <td>
                    <?php if(!empty($blog['avatar'])):?>
                        <img height="80px" src="assets/uploads/<?php echo $blog['avatar']; ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $blog['summary'];?></td>
                <td><?php echo $blog['content'];?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($blog['created_at']));?></td>
                <td><?php echo !empty($blog['updated_at']) ? date('d-m-Y H:i:s', strtotime($blog['updated_at'])) :'--' ;?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=blog&action=detail&id=".$blog['id'];
                    $url_update = "index.php?controller=blog&action=update&id=".$blog['id'];
                    $url_delete = "index.php?controller=blog&action=delete&id=".$blog['id'];
//                    $url_delete = "xoa-san-pham/".$blog['id'];
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
