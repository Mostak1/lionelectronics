<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
// <!-- connetion  -->
use App\db;

$conn = db::connect();


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    if ($pass !== $rpwd) {
        echo "Password is not match";
        exit;
    } else {


        $sql = "select * from `users` where 1";
        $result1 = $conn->query($sql);
        if ($result1) {
            $res = $result1->fetch_assoc();
            if ($email == $res['email']) {

                header("location:" . settings()['homepage'] . "/registration.php");
                $emailex = 'Email Exist';
                exit;
            } else {
                $sql = "insert into `users` (name,email,password,role) values('$name','$email','$password','1')";
                //    echo $sql;
                //    exit;

                $result = $conn->query($sql);
                if ($result) {
                    $succ= "Registration Successfull";
                   header("location: login.php?m=Registration Success") ;
                } else {
                    echo "Data Not inserted";
                }
            }
        }
    }
}
?>

<!-------- Header start---- -->
<?php
require __DIR__ . '/components/bodyheader.php';
require __DIR__ . '/components/header.php';
?>
<link rel="stylesheet" href="<?= settings()['homepage'] ?>/assets/css/home_body.css">
<!-------- Header end---- -->
</head>

<body>
    <!-------- body start---- -->
    <!-- manubar -->
    <?php
    require __DIR__ . '/components/menubar.php';
    ?>

    <!-- manubar end -->
    <!-- main content  -->
    <div class="logreg">
        <div class="container ">


            <!-- registration form  -->
            <div class="shadow-lg mt-5 p-3 mx-auto mb-5 rounded" id="registration">
                <form class="form-horizontal  mx-auto" method="post">
                    <h2 class="text-center my-4"><?=$succ ??"Registration" ?></h2>
                    <hr>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="name">User Name:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" autocomplete="off" required>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>

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
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="rpass">Re-Type Password:</label>
                        <div class="col-sm">
                            <input type="password" autocomplete="off" class="form-control" id="rpass" placeholder="Enter password" name="rpwd" required>
                            <div class="spanf" id="rpasserror"></div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" class="check" name="remember" required> Accept all terms
                                    and
                                    conditions.</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10 mx-auto px-3 text-center">
                            <input id="submit" class="" name="submit" type="submit" value="Sign Up">
                            <!-- <button onclick="emailCheck()" type="button" class="btn btn-default bg-primary px-4">Submit</button> -->
                        </div>
                    </div>
                </form>
<h1><?=$emailex ?? "" ?></h1>
                

            </div>
        </div>
        <p class="text-center">Register and Sign In in the website. Thank You</p>
    </div>

    <!-- registration form  -->



    </div>
    </div>
    <!-------- body end---- -->
    <!-------- footer---- -->
    <?php
    require __DIR__ . '/components/footer.php';
    ?>