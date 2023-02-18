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
<?php
if (isset($_POST['addbtn'])) {
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $sql = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) VALUES ('','$name','$email','$pass','$role')";
    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        header("location:" . settings()['homepage'] . "admin/user/user_display.php");
    }
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
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-primary">Add User From Here</h2>

                    <form class="login-form  " action="" method="post">
                        <div>
                            <label class="form-label" for="">User Name</label>
                            <input class="form-control" type="text" name="uname" placeholder="User name" required>
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Password</label>
                            <input class="form-control" type="password" name="pass">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Role</label>
                            <input class="form-control" type="number" name="role">
                        </div>
                        <input class="btn btn-outline-primary mt-3" type="submit" name="addbtn" value="Add">
                    </form>
                    <!---/ Product Adding Function php --->


                </div>
                <hr>


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
                                <th scope="row"><?=$row['id']?></th>
                                <td><?=$row['name']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['password']?></td>
                                <td><?=$row['role']?></td>
                            </tr>
                    </tbody>
                <?php
                        }
                ?>
                </table>
                <!-- show value in table end -->

            </div>
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