<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

// use App\auth\Admin;

// if (!Admin::Check()) {
//     header('HTTP/1.1 503 Service Unavailable');
//     exit;
// }

use App\db;

$conn = db::connect();
?>
<?php require __DIR__ . '/../components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
            <div class="row">
                        <h2>Add Brand From Here</h2>
                        <form class="my-5" method="post" enctype="multipart/form-data">

                           
                            <div class="mb-3">
                                <label for="title" class="form-label">Brand Name:</label>
                                <input type="text" name="name" class="form-control" id="name" required >
                            </div>
                           


                            <button type="submit" class="btn mx-auto btn-primary" name="submit">Submit</button>
                        </form>
                        <!---/ Product Adding Function php --->
                        <?php
                        

                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                           

                            $sql = "INSERT INTO `brands`(`name`) VALUES ('$name')";

                            // echo $sql;
                            // exit;

                            $result = $conn->query($sql);
                            if ($result) {
                               
                                echo "Brand data inserted";
                            } else {

                                echo "data inserted invalid";
                            }
                        }
                        // header("Location:add-product.php");
                        ?>

                    </div>

            </div>
            <!-------------------------- display content end--------------------------- -->


            <!-- footer -->
            <?php require __DIR__ . '/../components/footer.php'; ?>
        </div>
    </div>
    <script src="<?= settings()['adminpage'] ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-area-demo.js"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/datatables-simple-demo.js"></script>
</body>

</html>