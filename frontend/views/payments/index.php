<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 9:55 PM
 */
//require_once 'helpers/Helper.php';
?>
<?php
if(isset($_SESSION['cart'])):
?>
<section class="shoping-cart spad">
<div class="container">
    <h2 style="text-align: center">Thanh toán</h2>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h5 style="text-align: center">Thông tin khách hàng</h5>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name"
                           id="first_name"
                           value=""
                           class="form-control"
                           placeholder="Your first name"
                    />
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name"
                           id="last_name"
                           value=""
                           class="form-control"
                           placeholder=""
                    />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address"
                           id="address"
                           value=""
                           class="form-control"
                           placeholder=""
                    />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone"
                           id="phone"
                           min="0"
                           value=""
                           class="form-control"
                           placeholder=""
                    />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"
                           id="email"
                           value=""
                           class="form-control"
                           placeholder=""
                    />
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note"
                              id="note"
                              class="form-control"
                    ></textarea>
                </div>
                <div class="form-group">
                    <label>Phương thức thanh toán</label><br/>
                    <input type="radio" name="method" value="0"/>Thanh toán trực tuyến<br/>
                    <input type="radio" name="method" value="1"/>COD<br/>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h5 style="text-align: center">Thông tin đơn hàng</h5>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total_cart = 0;
                                    foreach ($_SESSION['cart'] AS $cart): ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img height="80" src="../backend/assets/uploads/<?php echo $cart['avatar'];?>" alt="">
                                                <h5><?php echo $cart['name'];?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                $<?php echo number_format($cart['price']);?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <?php echo $cart['quantity'];?>
                                            </td>
                                            <td class="shoping__cart__total">
                                                $<?php
                                                $total_item = $cart['price'] * $cart['quantity'];
                                                echo number_format($total_item);
                                                $total_cart += $total_item;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4">
                                            <b>Tổng giá trị đơn hàng:</b>
                                            <span>
                                                <?php echo number_format($total_cart, 0, '.', '.');?>vnđ
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Thanh toán" class="site-btn"/>
        <a href="index.php?controller=cart&action=index" class="primary-btn cart-btn">Về trang giỏ hàng</a>
    </form>
</div>
</section>
<?php else:
    header("Location: index.php?controller=home&action=index");
exit();
?>
<?php endif; ?>
