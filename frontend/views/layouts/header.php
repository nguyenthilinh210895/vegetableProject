<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/26/2020
 * Time: 5:54 PM
 */
?>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="assets/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php?controller=home"><img src="assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="index.php?controller=home">Home</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
<!--                                <li><a href="./shop-details.html">Shop Details</a></li>-->
                                <li><a href="index.php?controller=cart&action=index">Shoping Cart</a></li>
                                <li><a href="index.php?controller=payment&action=index">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="index.php?controller=contact&action=index">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <?php
                    if(isset($_SESSION['cart'])):
                        $total_price = 0;
                        $count_product = count($_SESSION['cart']);
                        foreach ($_SESSION['cart'] AS $cart){
                            $total_price += $cart['quantity'] * $cart['price'];
                        }
                        $count_favorite = 0;
                        if(isset($_SESSION['favorite'])){
                            $count_favorite = count($_SESSION['favorite'], 0);
                        }
                    ?>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-heart">
                                </i> <span><?php echo $count_favorite; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=cart&action=index"><i class="fa fa-shopping-bag">
                                </i> <span><?php echo $count_product; ?></span></a>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>$<?php echo number_format($total_price); ?></span></div>
                    <?php else: ?>
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                        <li><a href="index.php?controller=cart&action=index"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$0</span></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
