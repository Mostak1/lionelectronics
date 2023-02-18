<?php
require __DIR__ . '/vendor/autoload.php';

$page = "Home";
//<!-- connetion  -->
use App\user;
use App\model\category;
use App\db;

$conn = db::connect();
// <!-------------------------------- connection with myadmin table------------------------- -->

?>
<!-------------------------------- connection with myadmin table------------------------- -->

<!-- connetion  -->
<!--------HTML Header start---- -->
<?php
require __DIR__ . '/components/header.php';
?>
<link rel="stylesheet" href="<?= settings()['homepage'] ?>/assets/css/home_body.css">
<!--------HTML Header end---- -->
<style>

</style>
</head>

<body>
    <!-------- body start---- -->
    <!-- bodyheader  -->
    <?php
    require __DIR__ . '/components/bodyheader.php';
    ?>
    <!-- bodyheader  -->
    <!-- manubar -->
    <?php
    require __DIR__ . '/components/menubar.php';
    ?>

    <!-- manubar end -->

    <!-- ----------------------carosule start ------------- -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active heightca" data-bs-interval="10000">
                <img src="assets/images/carosul-01.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item heightca" data-bs-interval="2000">
                <img src="assets/images/carosul-02.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item heightca">
                <img src="assets/images/carosul-03.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- -----------carosule end------------------ -->
    <hr>
    <div class="text-center">

        <span id="btn1" class="redline homenv me-3 active " aria-current="true" href="">Hot Products </span>
        <span id="btn2" class="redline homenv me-3" href=""> Top Selling </span>
        <span id="btn3" class="redline homenv" href=""> New Arrival</span>
    </div>
    <!------------------- hot products ------ -->
    <div class="container-fluid bg-trasparent my-4 p-3  allhide" id="group1" style="position: relative;">
        <h4 class="text-center">Hot Products</h4>
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            <?php
            $selectQuery = "select * from products where 1 limit 20,8";
            $result = $conn->query($selectQuery);
            if ($result->num_rows) {
                while ($res = $result->fetch_assoc()) {

            ?>
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <div class="cardsimg">

                                <img src="productimg/<?= $res['images'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="label-top shadow-sm">
                                <?= $res['name'] ?? "" ?>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3">
                                    <span class="float-start badge rounded-pill bg-success"><?= $res['price'] ?? "" ?>TK
                                    </span>
                                    <span class="float-end">
                                        <a href="#" class="small text-muted">
                                            <?= $res['discount'] ?? "" ?>
                                        </a>
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <?= $res['description'] ?? "" ?>
                                </h5>
                                <div class="text-center my-4">
                                    <a href="product_details.php?id=<?= $res['id'] ?>" class="btn btn-warning"> Details </a>
                                </div>
                                <div class="clearfix mb-1">
                                    <span class="float-start">
                                        <i class="far fa-question-circle"></i>
                                    </span>
                                    <span class="float-end">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }

            ?>
        </div>
    </div>
    <!------------------- hot products ------ -->

    <!-- ----------top Products -------- -->

    <div class="container-fluid bg-trasparent my-4 p-3 hide allhide" id="group2" style="position: relative;">
        <h4 class="text-center">Top Selling</h4>
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            <?php
            $selectQuery = "select * from products where 1 limit 8";
            $result = $conn->query($selectQuery);
            if ($result->num_rows) {
                while ($res = $result->fetch_assoc()) {

            ?>
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <div class="cardsimg">

                                <img src="productimg/<?= $res['images'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="label-top shadow-sm">
                                <?= $res['name'] ?? "" ?>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3">
                                    <span class="float-start badge rounded-pill bg-success"><?= $res['price'] ?? "" ?>TK
                                    </span>
                                    <span class="float-end">
                                        <a href="#" class="small text-muted">
                                            <?= $res['discount'] ?? "" ?>
                                        </a>
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <?= $res['description'] ?? "" ?>
                                </h5>
                                <div class="text-center my-4">
                                    <a href="product_details.php?id=<?= $res['id'] ?>" class="btn btn-warning"> Details </a>
                                </div>
                                <div class="clearfix mb-1">
                                    <span class="float-start">
                                        <i class="far fa-question-circle"></i>
                                    </span>
                                    <span class="float-end">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }

            ?>
        </div>
    </div>
    <!-- ----------top Products -------- -->
    <!-------------------------- new arivals------------  -->
    <div class="container-fluid bg-trasparent my-4 p-3 hide allhide" id="group3" style="position: relative;">
        <h4 class="text-center">New Arival</h4>
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

            <?php
            $selectQuery = "select * from products ORDER BY id DESC limit 8";
            $result = $conn->query($selectQuery);
            if ($result->num_rows) {
                while ($res = $result->fetch_assoc()) {

            ?>
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <div class="cardsimg">

                                <img src="productimg/<?= $res['images'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="label-top shadow-sm">
                                <?= $res['name'] ?? "" ?>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3">
                                    <span class="float-start badge rounded-pill bg-success"><?= $res['price'] ?? "" ?>TK
                                    </span>
                                    <span class="float-end">
                                        <a href="#" class="small text-muted">
                                            <?= $res['discount'] ?? "" ?>
                                        </a>
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <?= $res['description'] ?? "" ?>
                                </h5>
                                <div class="text-center my-4">
                                    <a href="product_details.php?id=<?= $res['id'] ?>" class="btn btn-warning"> Details </a>
                                </div>
                                <div class="clearfix mb-1">
                                    <span class="float-start">
                                        <i class="far fa-question-circle"></i>
                                    </span>
                                    <span class="float-end">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }

            ?>
        </div>
    </div>
    <!-------------------------- new arivals------------  -->
    <!-- Offers card -->
    <section id="offers" class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class="offers-content text-center mx-auto">
                    <span class="text-danger">Discount Up To 40%</span>
                    <h2 class="mt-2 mb-4 text-danger">Grand Sale Offer!</h2>
                    <a href="product.php" class="btn btn-outline-danger">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Offers card  -->
    <div class="container" >
        <div class="text-center mx-auto" style="width: 300px;">

            <h4 class="redline homenv">Some Customer review</h4>
        </div>
        <div class="row mb-5">
            <div class="col customer me-2" id="">
                <img src="assets/images/product04.png" alt="">
                <h4>Comment Of Customer:</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia consectetur, qui iste veniam deleniti cumque tempore. Earum corrupti vero alias ex, veritatis culpa nemo eum, molestias cumque exercitationem nulla.</p>
            </div>
            <div class="col customer me-2">
                <img src="assets/images/product02.png" alt="">
                <h4>Comment Of Customer:</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia consectetur, qui iste veniam deleniti cumque tempore. Earum corrupti vero alias ex, veritatis culpa nemo eum, molestias cumque exercitationem nulla.</p>
            </div>
            <div class="col customer me-2">
                <img src="assets/images/product02.png" alt="">
                <h4>Comment Of Customer:</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia consectetur, qui iste veniam deleniti cumque tempore. Earum corrupti vero alias ex, veritatis culpa nemo eum, molestias cumque exercitationem nulla.</p>
            </div>
        </div>
    </div>





    <!------------ jquery coad------------  -->
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".hide").hide();
            //click event
            $("#btn1").click(function() {
                $(".allhide").hide(function() {
                    $("#group1").show(1000);
                });
            });
            $("#btn2").click(function() {
                $(".allhide").hide(function() {
                    $("#group2").show(1000);
                });
            });
            $("#btn3").click(function() {
                $(".allhide").hide(function() {
                    $("#group3").show(1000);
                });
            });

        });
    </script>
    <!------------ jquery coad------------  -->

    <!-------- body end---- -->
    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>