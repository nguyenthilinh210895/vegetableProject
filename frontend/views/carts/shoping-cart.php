<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 2:39 PM
 */
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php?controller=home">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(isset($_SESSION['cart'])): ?>
<section class="shoping-cart spad">
    <form action="" method="post"
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total_cart = 0;
                        foreach ($_SESSION['cart'] AS $product_id => $cart): ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img height="50" src="../backend/assets/uploads/<?php echo $cart['avatar'];?>" alt="">
                                    <h5><?php echo $cart['name'];?></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    $<?php echo number_format($cart['price']);?>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type=""
                                                   min="0"
                                                   name="<?php echo $product_id;?>"
                                                   value="<?php echo $cart['quantity'];?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    $<?php
                                    $total_item = $cart['price'] * $cart['quantity'];
                                    echo number_format($total_item);
                                    $total_cart += $total_item;
                                    ?>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a class="icon_close" href="index.php?controller=cart&action=delete&id=<?php echo $product_id; ?>"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="index.php?controller=home" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <!--                    <a href="index.php?controller=cart&action=update" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>-->
                    <!--                        Upadate Cart</a>-->
                    <input type="submit" name="submit" value="Update Cart" class="primary-btn cart-btn cart-btn-right"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>$<?php echo number_format($total_cart); ?></span></li>
                        <li>Total <span>$<?php echo number_format($total_cart); ?></span></li>
                    </ul>
                    <a href="index.php?controller=payment&action=index" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
<?php else: ?>
<section class="shoping-cart spad">
    <div class="container" style="text-align: center">
        <div >
            <img src="assets/img/cart/emptycart.png" height="45%" width="45%">
            <h3>Bạn chưa có sản phẩm nào trong giỏ hàng!</h3>
        </div>
    </div>
</section>
<?php endif; ?>