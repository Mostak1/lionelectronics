<?php
require __DIR__ . '/vendor/autoload.php';
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();

// }
// if(!$_SESSION['loggedin']){
//     header('location:login.php');
// }
$page = "Home";

?>
<!-- connetion  -->
<?php

use App\user;
use App\model\category;
use App\db;

$conn = db::connect();
$id = $_GET["id"];
$selectQuery = "select * from products where id= $id";
$result = $conn->query($selectQuery);
        $row = $result->fetch_assoc();

        $catid = $row['cat_id'];
        $bid = $row['brand_id'];
        $title = $row['title'];
        $desc = $row['description'];
        $mft = $row['manufacturer_id'];
        $dimensions = $row['dimensions'];
        $weight = $row['weight'];
        $price = $row['sprice'];
        $discount = $row['discount'];
        $userid = $row['user_id'];
        $quantity = $row['quantity'];
?>
<!-- connetion  -->
<!--------HTML Header start---- -->
<?php
require __DIR__ . '/components/header.php';
?>

<!--------HTML Header end---- -->
<style>
    #topp {
        margin-top: 100px !important;
    }

    .col-md-5 img {
        object-fit: cover;
        max-height: 600px;
        overflow: hidden;
    }
</style>
</head>

<body>
    <!-------- body start---- -->
    <!-- bodyheader  -->
    <?php
    require __DIR__ . '/components/bodyheader.html';
    ?>
    <!-- bodyheader  -->
    <!-- manubar -->
    <?php
    require __DIR__ . '/components/menubar.php';
    ?>

    <!-- manubar end -->


    <div class="shadow-lg mb-3 mx-auto" >

        <div class="container">
            <div class=" row">
                <div class="col-md-6">
                    <div class="border mainimg">
                        <img src="assets/image/macbook-air-01-500x500 (1).jpg" width="100%" id="limg" alt="">
                    </div>
                    <div class="row mt-2 mx-auto border position-relative">


                        <div class="col my-2">
                            <img class="subimg border" src="assets/image/macbook-air-gold-500x500.jpg" width="100%" alt="">
                        </div>
                        <div class="col  my-2">
                            <img class="subimg border" src="assets/image/zenbook-14-0001-500x500.jpg" width="100%" alt="">
                        </div>
                        <div class="col  my-2">
                            <img class="subimg border" src="assets/image/macbook-air-gold-500x500.jpg" width="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3><? $title ??"" ?></h3>
                    <hr>
                    <p>Menufacturer: <? $mft ??"" ?> </p>
                    <p>Availability:<? $quantity ??"" ?> </p>
                    <p>Product Coad: <?  "#1234" ?></p>
                    <br>
                    <h3>Product Dimensions and Weight</h3>
                    <p>Product Dimensions:<? $dimensions ??"" ?></p>
                    <p>Product Weight:<? $weight ??"" ?></p>
                    <hr>
                    
                    <p class="position-relative"><span class="position-absolute start-0 text-decoration-line-through text-danger">Price:$000 </span> <span class="position-absolute end-0">Discount Price:$000 </span></p>
                    <br><br>
                    <div class="buyicon ">
                        <a class="color-bg px-3 py-1 fs-5 rounded" href="">
                            <i class="fa-solid fa-cart-shopping "></i> Add to Chart
                        </a>
                        <a class="bg-secondary-emphasis fs-5 text-secondary px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="bg-secondary-emphasis fs-5 text-secondary px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fs-5 fa-code-compare"></i>
                        </a>
                        <a class="bg-secondary-emphasis fs-5 text-secondary px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fa-question"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row">
                <h2>Details:</h2>
                <h3></h3>
                <p><?=$desc1 ?? ""  ?></p>
            </div>


        </div>
    </div>


    <script>
        let limg = document.getElementById("limg");
        let simg = document.getElementsByClassName("subimg");

        simg[0].onclick = function() {
            limg.src = simg[0].src;
            simg[0].style.filter = "blur(0px)";
        };
        simg[1].onclick = function() {
            limg.src = simg[1].src;
            simg[1].style.filter = "blur(0px)";
        };
        simg[2].onclick = function() {
            limg.src = simg[0].src;
            simg[2].style.filter = "blur(0px)";
        };
    </script>







    <!-------- body end---- -->
    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>