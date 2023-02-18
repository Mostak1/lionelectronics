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
if (isset($_POST['sub'])) {
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pass',`role`='$role' WHERE `id` = '$uid'";

    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        header("location:" . settings()['homepage'] . "admin/user/user_display.php");
    }
}
$sql1 = "select * from `images` where id=$id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
$name1 = $row['name'];
$email1 = $row['email'];
$pass1 = $row['password'];
$role1 = $row['role'];
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
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-primary">Edit User From Here</h2>

                    <form class="login-form  " action="" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div>
                            <label class="form-label" for="">User Name</label>
                            <input class="form-control" type="text" name="uname" placeholder="<?= $name1 ?? ""?>" required>
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="<?= $email1 ?? ""?>">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Password</label>
                            <input class="form-control" type="password" placeholder="<?= $pass1 ?? ""?>" name="pass">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Role</label>
                            <input class="form-control" type="number" placeholder="<?= $role1 ?? ""?>" name="role">
                        </div>
                        <input class="btn btn-outline-primary mt-3" type="submit" name="sub" value="Update">
                    </form>
                    <!---/ Product Adding Function php --->


                </div>
                <hr>


                <!-- show value in table start -->

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