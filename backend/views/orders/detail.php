<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/31/2020
 * Time: 3:49 PM
 */
?>
<?php //if(!empty($order_details)): ?>
<h2><?php echo $last_name." ". $first_name;?></h2>
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tổng tiền</th>
        <th></th>
    </tr>
        <?php
        $stt = 0;
        foreach ($order_details AS $order_detail):
            ++$stt;
            ?>
            <tr>
                <td><?php echo $stt;?></td>
                <td>
                    <img height="50" src="assets/uploads/<?php echo $order_detail['avatar'];?>">
                </td>
                <td><?php echo $order_detail['title'];?></td>
                <td><?php echo $order_detail['order_detail_quantity'];?></td>
                <td><?php echo $order_detail['price'];?></td>
                <td><?php echo $order_detail['price_total'];?></td>
                <td>

                </td>
            </tr>
        <?php endforeach; ?>
</table>
<?php //endif; ?>