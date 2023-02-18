<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container mx-auto pt-2 row">
            <ul class="col-6 ">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa-regular fa-envelope"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa-solid fa-location-dot"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <div class="col-1"></div>
            <ul class="col-5 text-end">
                <li><a class="me-2" href="#"><i class="fa fa-dollar"></i> USD</a></li>


                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                    <li class="">
                        <a class="me-2" aria-current="page" href=""><?= $_SESSION['username'] ?> Profile</a>
                    </li>
                    <li class="">
                        <a class="" aria-current="page" href="logout.php">Log Out</a>
                    </li>
                <?php } else { ?>
                    <li class="">
                        <a class="me-2" aria-current="page" href="login.php"><i class="fa-solid fa-user"></i>Login</a>
                    </li>
                    <li class="">
                        <a class="" aria-current="page" href="registration.php">Register</a>
                    </li>
                <?php }  ?>

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->


</header>
<!-- /HEADER--->
<div id="header" class="mb-3">
    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.png" width="120px" alt=""></a>

            <button class="navbar-toggler text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                Menu <span class="text-white navbar-toggler-icon"></span>
            </button>
            <div class="">
                <form class="input-group" method="post">
                    <input class="form-control border-danger " type="search" placeholder="Search here">
                    <input class="btn btn-outline-danger px-2" type="submit" value="Search">
                </form>
            </div>
            <div class="collapse  navbar-collapse " id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item me-3">
                        <a class="redlinem homenvm" href="index.php">Home </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="redlinem homenvm" href="product.php">Product </a>
                    </li>

                    <li class="nav-item me-3">
                    <?php if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] && $_SESSION['role'] == "2" ) { ?>
                        <a class="redlinem homenvm" href="<?= settings()['adminpage'] ?>" target="_blank">Admin </a>
                        <?php } ?>
                    </li>

                </ul>


            </div>

            <div class="nav-item me-2">
                <a href="single_cart.php" class="nav-link position-relative cart"><i class="fa-solid fa-heart"></i> Wishlist
                    <span class="position-absolute top-3 start-100 translate-middle badge rounded-pill" id="witch"></span>

                </a>
            </div>
            <div class="nav-item ">
                <a href="single_cart.php" class="nav-link position-relative cart"><i class="fa-solid fa-cart-shopping"></i> Cart
                    <span class="position-absolute top-3 start-100 translate-middle badge rounded-pill" id="bcart">0</span>

                </a>
            </div>


        </div>
    </nav>
</div>