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
$id = $_GET['updateid'];
if (isset($_POST['submit'])) {
    $pid = $_POST['p_id'];
    $title = $_POST['title'];


    $image = $_FILES['image'];


    $imagenm = $image['name'];

    $sql = "UPDATE `images` SET `p_id`='$pid',`name`='$imagenm',`title`='$title' WHERE `id`='$id'";
    // echo $sql;
    // exit;

    $result = $conn->query($sql);
    if ($result) {
        move_uploaded_file($image['tmp_name'], settings()['homepage'] . "productimg/" . $image['name']);
        echo "Image data inserted";
    } else {

        echo "data inserted invalid";
    }
}
// header("Location:add-product.php");
$sql1 = "select * from `images` where id=$id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
$pid1 = $row['p_id'];
$title1 = $row['title'];
$image1 = $row['image'];


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
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="number" name="" hidden placeholder="<?= $id ?>" id="">
                        <div class="mb-3">
                            <label for="p_id" class="form-label">Product Id:</label>
                            <input class="form-control" type="number" name="p_id" id="p_id" placeholder="<?=$pid1 ?? "" ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="<?=$image1 ?? "" ?>">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" height="2" name="title" id="title" placeholder="<?=$title1 ?? "" ?>" class="form-control">
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