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

if (isset($_POST['submit'])) {
    $cat = $_POST['category_id'];
    $bid = $_POST['brand_id'];
    $mft = $_POST['manufacturer'];
    $userid = $_POST['user_id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $dim = $_POST['dimensions'];
    $weight = $_POST['weight'];
    $pprice = $_POST['pprice'];
    $sprice = $_POST['sprice'];
    $discount = $_POST['discount'];

    $image = $_FILES['image'];
    $quantity = $_POST['quantity'];
    $hot = $_POST['hot'];
    $options = $_POST['options'];

    $imagenm = $image['name'];

    $sql = "insert into `products` (`cat_id`, `brand_id`, `manufacturer_id`, `user_id`, `title`, `description`, `dimensions`, `weight`, `pprice`, `sprice`, `discount`, `images`, `quantity`, `hot`, `options`) values('$cat','$bid','$mft','$userid','$title','$desc','$dim','$weight','$pprice','$sprice','$discount','$imagenm','$quantity','$hot','$options')";

    // echo $sql;
    // exit;

    $result = $conn->query($sql);
    if ($result) {
        move_uploaded_file($image['tmp_name'], settings()['homepage'] . "productimg/" . $image['name']);
        $insert ="Product data inserted";
    } else {

        echo "data inserted invalid";
    }
}
// header("Location:add-product.php");


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
                    <h2>Add Product From Here</h2>
                    <h3 class="text-danger">

                        <?= $insert ?? "" ?>
                    </h3>
                    <form class="my-5" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category Id:</label>
                            <input class="form-control" type="number" name="category_id" id="category_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand Id:</label>
                            <input class="form-control" type="number" name="brand_id" id="brand_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="manufacturer" class="form-label">Manufacturer ID:</label>
                            <input type="text" name="manufacturer" class="form-control" id="manufacturer" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User Id:</label>
                            <input type="number" class="form-control" name="user_id" id="user_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dimensions" class="form-label">Dimensions:</label>
                            <input type="text" class="form-control" name="dimensions" id="dimensions" required>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight:</label>
                            <input type="text" class="form-control" name="weight" id="weight" required>
                        </div>
                        <div class="mb-3">
                            <label for="pprice" class="form-label">Purchase Price:</label>
                            <input type="number" class="form-control" name="pprice" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="sprice" class="form-label">Selling Price:</label>
                            <input type="number" class="form-control" name="sprice" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount:</label>
                            <input type="number" class="form-control" name="discount" id="discount" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="hot" class="form-label">Hot:</label>
                            <input type="number" height="2" name="hot" id="hot" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="options" class="form-label">Options:</label>
                            <input type="text" name="options" id="options" class="form-control">
                        </div>




                        <button type="submit" class="btn mx-auto btn-primary" name="submit">Submit</button>
                    </form>
                    <!---/ Product Adding Function php --->

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