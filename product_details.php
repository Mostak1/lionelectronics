<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();

}
if(!$_SESSION['loggedin']){
    header('location:login.php');
}
$page = "Product Details";

?>
<!-- connetion  -->
<?php
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

    .mainimg {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        object-fit: fill;
    }

    .subimg {
        height: 200px !important;
        object-fit: fill;
        filter: blur(3px);
    }

    .subimg:hover {
        object-fit: fill;
        filter: blur(0px);
        transition: .5s;
    }

    .color-bg {
        background-color: rgb(109, 150, 28) !important;
        color: whitesmoke;
        box-shadow: 5px 8px 10px rgb(190, 200, 170);
    }

    .lefticon {
        position: absolute;
        top: 45%;
        z-index: 1;
    }
    .buyicon a:hover{
        color: white;
        background-color: rgb(255, 32, 32) ;
    }
    .buyicon a{
        border: 1px solid rgb(255, 32, 32);
    color: rgb(255, 32, 32);
    border-radius: 20px;
    background-color: white ;
    margin-left: 3px;
    }
    
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


    <div class="shadow-lg mb-3 mx-auto">

        <div class="container">
            <div class=" row">
                <div class="col-md-6">
                    <div class="border mainimg">
                        <img src="<?= settings()['homepage'] ?>/productimg/63aaaceac28f1.png" width="100%" height="600px" id="limg" alt="comming">
                    </div>
                    <div class="row mt-2 mx-auto border position-relative">


                        <div class="col my-2">
                            <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63ae7b4b4be6b.png" width="100%" alt="">
                        </div>
                        <div class="col  my-2">
                            <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63aaabd1771e1.png" width="100%" alt="">
                        </div>
                        <div class="col  my-2">
                            <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63aaac74aa3d2.png" width="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3><?= $title ?? "Title Here" ?></h3>
                    <hr>
                    <p>Menufacturer: <?= $mft ?? "" ?> </p>
                    <p>Availability:<?= $quantity ?? "" ?> </p>
                    <p>Product Coad: <?= "#1234" ?></p>
                    <br>
                    <h3>Product Dimensions and Weight</h3>
                    <p>Product Dimensions:<?= $dimensions ?? "" ?></p>
                    <p>Product Weight:<?= $weight ?? "" ?></p>
                    <hr>

                    <p class="position-relative"><span class="position-absolute start-0 text-decoration-line-through text-danger">Price:$000 </span> <span class="position-absolute end-0">Discount Price:$000 </span></p>
                    <br><br>
                    <div class="buyicon ">
                        <a class=" px-3 py-1 fs-5 rounded" href="">
                            <i class="fa-solid fa-cart-shopping "></i> Add to Chart
                        </a>
                        <a class=" fs-5  px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class=" fs-5  px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fs-5 fa-code-compare"></i>
                        </a>
                        <a class="-emphasis fs-5  px-3 py-1 rounded shadow-lg" href="">
                            <i class="fa-solid fa-question"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row">
                <h2>Details:</h2>
                <h3></h3>
                <p><?= $desc ?? ""  ?></p>
            </div>


        </div>
    </div>


    <script>
        let limg = document.getElementById("limg");
        let simg = document.getElementsByClassName("subimg");

        simg[0].onclick = function() {
            limg.src = simg[0].src;
            simg[0].style.filter = "blur(0px)";
            simg[1].style.filter = "blur(3px)";
            simg[2].style.filter = "blur(3px)";
        };
        simg[1].onclick = function() {
            limg.src = simg[1].src;
            simg[0].style.filter = "blur(3px)";
            simg[1].style.filter = "blur(0px)";
            simg[2].style.filter = "blur(3px)";
        };
        simg[2].onclick = function() {
            limg.src = simg[2].src;
            simg[0].style.filter = "blur(3px)";
            simg[1].style.filter = "blur(3px)";
            simg[2].style.filter = "blur(0px)";
        };
    </script>







    <!-------- body end---- -->
    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>