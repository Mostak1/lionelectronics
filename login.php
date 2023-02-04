<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();}
        require __DIR__ . '/vendor/autoload.php';
$page="LogIn";
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

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $select = "select * from users where email='$email' limit 1";
    $selectResult = $conn->query($select);
    if($selectResult->num_rows){
        $row = $selectResult->fetch_assoc();
        if(password_verify($pass,$row['password'])){
$_SESSION['userid'] = $row['id'];
$_SESSION['username'] = $row['name'];
$_SESSION['loggedin'] = true;
$_SESSION['role'] = $row['role'];
if($row['role'] =="1"){
header("location:index.php");
}
if($row['role'] =="2"){
    header("location:admin/index.php");
}
        }
        else{
            exit;
        }
    }

}
?>
        <!-------- Header start---- -->
        <?php
        require __DIR__ . '/components/header.php';
        ?>

<!-------- Header end---- -->
</head>
<body>
    <!-------- body start---- -->
    
<!--top manubar -->
<?php
        require __DIR__ . '/components/menubar.php';
        ?>
   
   <!-- manubar end -->
   <!-- main content  --> 
   <div class="container-xl">
        <?php
        echo testfunc();
        $r= $conn->query("SELECT * FROM users WHERE 1");
        echo "<h1>Total users $r->num_rows </h1>";
        ?>
        <?php
        echo testfunc();
        ?>
<!-- log in form  -->
<div class="shadow-lg mt-5 p-3 mx-auto mb-5 rounded" id="registration">
        <form class="form-horizontal  mx-auto" method="post">
            <h4 class="text-center my-4">Log In</h4>

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
                    <input id="submit" class="bg-outline-primary" name="submit" type="submit" value="Log In">
                    <!-- <button onclick="emailCheck()" type="button" class="btn btn-default bg-primary px-4">Submit</button> -->
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-sm-offset-2 col-sm-10 mx-auto px-3 text-center">
                    <p>If you Don't have any account, please <a href="<?= settings()['homepage'] ?>/registration.php" target="" rel="noopener noreferrer">registration</a> here.</p>
            </div>
            </div>
        </form>
        
       <?php

        // if (isset($_POST['submit'])) {

        //     $email = $_POST['email'];
        //     $pass = $_POST['pwd'];
        //     $password = password_hash($pass, PASSWORD_DEFAULT);


        //     $sql = "select * from `users` where email='$email' and password='$password'";
        //     //    echo $sql;
        //     //    exit;
        //     $result = $conn->query($sql);
        //     if ($result) {
        //         echo "Login successful";
        //     } else {
        //         echo "Login failed";
        //     }
            
        // }
        ?>
        
    </div>



<!-- log in form  -->


</div>
<!-------- body end---- -->
<!-------- footer---- -->
    <?php
        require __DIR__ . '/components/header.php';
    ?>