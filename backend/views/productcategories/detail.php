<h1>Chi tiết Product Category</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $product_category['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $product_category['name']; ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $product_category['description']; ?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($product_category['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($product_category['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=productcategory">Back</a>

