<?php
require __DIR__ . '/vendor/autoload.php';
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();

// }
// if(!$_SESSION['loggedin']){
//     header('location:login.php');
// }
$page = "Product";

?>
<!-- connetion  -->
<?php

use App\user;
use App\model\category;
use App\db;
$conn = db::connect();
?>
<!-- connetion  -->
<!-- pageinnetions -->
<?php
$pagenum = isset($_GET['page']) ? $_GET['page'] : "1";
$perpage = isset($_POST['perpage']) ? $_POST['perpage'] : "12";
$index = ($pagenum - 1) * $perpage;

$tot = "select id from products where 1";
$totr = $conn->query($tot);
$totalrecord = $totr->num_rows;
$totalpage = ceil($totalrecord / $perpage);
?>

<!-- pageinnetions -->
<!-------------------------------- connection with myadmin table------------------------- -->
<?php
$selectQuery = "select * from products where 1 limit $index,$perpage";
$result = $conn->query($selectQuery);
?>
<!-------------------------------- connection with myadmin table------------------------- -->
<!-------------------------------- HTML Start------------------------- -->
<!--------HTML Header start---- -->
<?php
require __DIR__ . '/components/header.php';
?>

<!--------HTML Header end---- -->
<style>

</style>
</head>

<body>
    <!-------------------------------- navbar -------------------------------------------->
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


    <!-------------------------------- navbar -------------------------------------------->
    <!------------------------------------ main body -------------------------------------->

    <div class="row container-xl mx-auto" id="topp">
        <!-- all cards -->
        <div class="col-md-10">
            <h2 class="card-title heading"> Our Products:</h2>
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

                    <?php
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
            <!-- pageinnetions form -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item">
                        <a class="page-link " href="?page=1">Start</a>
                    </li>
                    <li class="page-item <?= ($pagenum <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $pagenum - 1; ?>">Previous</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $totalpage; $i++) {
                        if (abs($i - $pagenum) < 5) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    ?>
                    <li class="page-item <?= ($pagenum == $totalpage) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $pagenum + 1; ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $totalpage ?>">End</a>
                    </li>
                </ul>

            </nav>
            <!-- pagination end -->
        </div>
        <!-- all cards -->
        <!-- right side column -->
        <div class="col-md-2">
            <div class="sidebar-area">

                <div class="category-area">
                    <div class="sidebar-heading">
                        <h3> Category</h3>
                    </div>
                    <ul class="category-list">
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">Smart phone</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">Desktop</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">laptop</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">Networking</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">software</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a href="">accessories</a></li>
                    </ul>
                </div>

                <div class="brand-area">
                    <div class="sidebar-heading">
                        <h3> Brand</h3>
                    </div>
                    <form action="" class="ms-4">
                        <input type="checkbox" name="brand[]" id="" value="hp"> HP <br>
                        <input type="checkbox" name="brand[]" id="" value="dell"> DELL <br>
                        <input type="checkbox" name="brand[]" id="" value="asus"> ASUS <br>
                        <input type="checkbox" name="brand[]" id="" value="samsung"> SAMSUNG <br>
                        <input type="checkbox" name="brand[]" id="" value="apple"> APPLE <br>
                        <input type="checkbox" name="brand[]" id="" value="toshiba"> TOSHIBA <br>
                    </form>
                </div>
                <div class="category-area">
                    <div class="sidebar-heading">
                        <h3> Price</h3>
                    </div>
                    <ul class="category-list ">
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$5000-$10000</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$10000-$15000</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$15000-$20000</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$20000-$25000</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$25000-$30000</a></li>
                        <li><i class="fa-solid me-2 fa-caret-right"></i><a class="fs-6" href="">$30000+</a></li>
                    </ul>
                </div>


            </div>
        </div>
        <!-- right side column -->
    </div>
    <!----------------------------- main body end-------------------------------------->

    <!-- Footer banner-->

    <!-- Footer banner-->




    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>