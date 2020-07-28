<?php
?>

<h2>Chi tiết sản phẩm #<?php echo $product['id']; ?></h2>
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
            </tr>
</table>
<a href="product" class="btn btn-primary">Back</a>