<?php
require __DIR__ . '/vendor/autoload.php';
//<! ------------------session -------------------------------->
if (session_status() === PHP_SESSION_NONE) {
    session_start();

}
if(!$_SESSION['loggedin']){
    header('location:login.php');
}
//<! ------------------session -------------------------------->
$page = "Cart";
//<!-------------------------------- connection with Database------------------------- -->
use App\db;

$conn = db::connect();
//<!-------------------------------- connection with Database------------------------- -->

//<!--------HTML Header start---- -->
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

    //<!-- bodyheader  -->
    //<!-- manubar -->
    require __DIR__ . '/components/menubar.php';
    ?>
    
    <!-- manubar end -->
    <!-- ------------------------Main Body Start Here----------------------------- -->

    <div class="container">
        <h1>Shopping Cart</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>$10.99</td>
                    <td>
                        <input type="number" class="form-control" value="1">
                    </td>
                    <td>$10.99</td>
                    <td>
                        <button class="btn btn-danger">Remove</button>
                    </td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>$20.99</td>
                    <td>
                        <input type="number" class="form-control" value="2">
                    </td>
                    <td>$41.98</td>
                    <td>
                        <button class="btn btn-danger">Remove</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Total:</td>
                    <td>$52.97</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>



    <!-- ------------------------Main Body Start Here----------------------------- -->



    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>