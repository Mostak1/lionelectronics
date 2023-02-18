<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
?>
<?php
$id = $_GET['deleteid'];
$sql = "DELETE FROM `users` WHERE `id` = '$id'";
$result = $conn->query($sql);
if ($conn->affected_rows) {
    header("location:" . settings()['homepage'] . "admin/user/udisplay.php");
}
?>
<?php require __DIR__ . '/../components/header.php';
//get records value and show in form
?>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">

            <div class="container">
                <!-- show value in table start -->
                <h1 class="text-center text-primary">All Users</h1>
                <table class="table table-primary table-striped table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from users where 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <th scope="row"><?= $row['id'] ?></th>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['role'] ?></td>
                            </tr>
                    </tbody>
                <?php
                        }
                ?>
                </table>
                <!-- show value in table end -->
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