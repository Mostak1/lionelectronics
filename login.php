<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "LogIn";
?>
<!-- connetion  -->
<?php

use App\user;
use App\model\category;
use App\db;

$conn = db::connect();
?>
<!-- session and php login -->
<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $select = "select * from users where email='$email' limit 1";
    $selectResult = $conn->query($select);
    if ($selectResult->num_rows) {
        $row = $selectResult->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == "1") {
                header("location:index.php");
            }
            if ($row['role'] == "2") {
                header("location:admin/index.php");
            }
        } else {
            // $comm="Please Insert Correct Email Address or Password";
            header("location:login.php");
        }
    }
}
?>
<!-------- Header start---- -->
<?php
require __DIR__ . '/components/header.php';
?>
<link rel="stylesheet" href="<?= settings()['homepage'] ?>/assets/css/home_body.css">
<!-------- Header end---- -->
</head>

<body class="">
    <!-------- body start---- -->

    <!--top manubar -->
    <?php
    require __DIR__ . '/components/bodyheader.php';
    ?>
    <?php
    require __DIR__ . '/components/menubar.php';
    ?>

    <!-- manubar end -->
    <!-- main content  -->
    <div class="logreg">
        <div class="container">
            <div class="shadow-lg mt-5 p-3 mx-auto mb-5 rounded" id="registration">
                <form class="form-horizontal  mx-auto" method="post">
                    <h4 class="text-center my-4">Log In</h4>
                    <p><?php echo isset($_GET['m'])? $_GET['m'].".Please login to your account" :"" ?></p>

                    <hr class="text-danger">
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="email">Email:</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            <div class="spanf" id="emailerror"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="pwd">Password:</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pwd" required>
                            <div class="spanf" id="passerror"></div>
                        </div>
                    </div>


                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10 mx-auto px-3 text-center">
                            <input id="submit" class="" name="submit" type="submit" value="Log In">
                            <!-- <button onclick="emailCheck()" type="button" class="btn btn-default bg-primary px-4">Submit</button> -->
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10 mx-auto px-3 text-center">
                            <p>If you Don't have any account, please <a href="<?= settings()['homepage'] ?>/registration.php" target="" rel="noopener noreferrer">registration</a> here.</p>
                        </div>
                    </div>
                </form>



            </div>



            <!-- log in form  -->

        </div>
    </div>
    <!-------- body end---- -->
    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    ?>