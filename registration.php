    <?php
    require __DIR__ . '/vendor/autoload.php';
    $page = "Registration";
    ?>
    <!-- connetion  -->
    <?php

    use App\user;
    use App\model\category;
    use App\db;

    $conn = db::connect();
    ?>
    <!-------- Header start---- -->
    <?php
    require __DIR__ . '/components/header.php';
    ?>

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
        <div class="container-xl">
            <?php

            $r = $conn->query("SELECT * FROM users WHERE 1");
            echo "<h1>Total users $r->num_rows </h1>";
            ?>

            <!-- registration form  -->
            <div class="shadow-lg mt-5 p-3 mx-auto mb-5 rounded" id="registration">
                <form class="form-horizontal  mx-auto" method="post">
                    <h2 class="text-center my-4">Register</h2>
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
                            <input id="submit" class="bg-outline-primary" name="submit" type="submit" value="Sign Up">
                            <!-- <button onclick="emailCheck()" type="button" class="btn btn-default bg-primary px-4">Submit</button> -->
                        </div>
                    </div>
                </form>

                <?php


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


                        $selectQuery = "select * from `users` where 1";
                        $result1 = $conn->query($selectQuery);
                        if ($result1->num_rows) {
                            $res = $result1->fetch_assoc();
                            if ($email == $res['email']) {

                                echo 'Email Exist';
                                exit;
                            } else {
                                $sql = "insert into `users` (name,email,password,role) values('$name','$email','$password','1')";
                                //    echo $sql;
                                //    exit;

                                $result = $conn->query($sql);
                                if ($result) {
                                    echo "<h1>Registration Successfull</h1>";
                                } else {
                                    echo "Data Not inserted";
                                }
                            }
                        }
                    }
                }
                ?>

            </div>
        </div>
        <p class="text-center">Register and Sign In in the website. Thank You</p>
        </div>

        <!-- registration form  -->




        </div>
        <!-------- body end---- -->
        <!-------- footer---- -->
        <?php
        require __DIR__ . '/components/header.php';
        ?>