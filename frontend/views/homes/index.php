<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/26/2020
 * Time: 5:47 PM
 */
?>
<!-- Hero Section Begin -->
<?php require_once 'views/homes/home_search.php';?>
<!-- Hero Section End -->
<!-- Categories Section Begin -->
<?php require_once 'views/homes/category.php'; ?>
<!-- Categories Section End -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <script>
                    // On mouse-over, execute myFunction
                    function myFunction() {
                        this.getAttribute("data-filter")
                    }
                </script>
                <div class="featured__controls">
                    <ul>

                        <li class="active" data-filter="*" onclick="myFunction()">All</li>
                        <li data-filter=".oranges" onclick="myFunction()">Oranges</li>
                        <li data-filter=".fresh-meat" onclick="myFunction()">Fresh Meat</li>
                        <li data-filter=".vegetables" onclick="myFunction()">Vegetables</li>
                        <li data-filter=".fastfood" onclick="myFunction()">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php if(!empty($products)): ?>
            <?php foreach ($products AS $product): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../backend/assets/uploads/<?php echo $product['avatar']; ?>">
                        <ul class="featured__item__pic__hover">
                            <li>
                                <?php
                                $url_favorite = "index.php?controller=favorite&action=add&id=".$product['id'];
                                ?>
                                <a href="<?php echo $url_favorite;?>">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <?php
                            $url_cart = "index.php?controller=cart&action=add&id=".$product['id'];
                            ?>
                            <li><a href="<?php echo $url_cart;?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#"><?php echo $product['title'];?></a></h6>
                        <h5>$<?php echo number_format($product['price']);?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h2>Không có sản phẩm nào</h2>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<?php require_once 'views/homes/latest.php';?>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<?php require_once 'views/homes/blog.php';?>
<!-- Blog Section End -->
