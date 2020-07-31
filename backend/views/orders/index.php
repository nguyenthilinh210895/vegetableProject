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


<h2>Danh sách đơn hàng</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Country</th>
        <th>Address</th>
        <th>Town City</th>
        <th>Country State</th>
        <th>Postcode</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Note</th>
        <th>Price Total</th>
        <th>Payment Status</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php

    if(!empty($orders)):
        ?>
        <?php
        foreach ($orders AS $order):
            ?>
            <tr>
                <td><?php echo $order['id'];?></td>
                <td><?php echo $order['user_id'];?></td>
                <td><?php echo $order['first_name'];?></td>
                <td><?php echo $order['last_name'];?></td>
                <td><?php echo $order['country'];?></td>
                <td><?php echo $order['address'];?></td>
                <td><?php echo $order['town_city'];?></td>
                <td><?php echo $order['country_state'];?></td>
                <td><?php echo $order['postcode'];?></td>
                <td><?php echo $order['phone'];?></td>
                <td><?php echo $order['email'];?></td>
                <td><?php echo $order['note'];?></td>
                <td><?php echo number_format($order['price_total']);?></td>
                <td><?php echo $order['payment_status'];?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($order['created_at']));?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=order&action=detail&id=".$order['id'];
                    $url_delete = "xoa-san-pham/".$order['id'];
                    ?>
                    <a href="<?php echo $url_detail;?>" title="Chi tiết"><i class="fa fa-eye"></i> </a>
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