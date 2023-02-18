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
                <button class="btn btn-primary my-5">
                    <a href="user.php" class="text-decoration-none text-light"> Add Brand</a>

                </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Image Title</th>
                            <th scope="col">Input Time</th>
                            <th scope="col" colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $sql = "select * from `images` where 1";
                        // $result = $con->query($sql);
                        $result = $conn->query($sql);
                        if ($result) {


                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $pid = $row['p_id'];
                                $name = $row['name'];
                                $title = $row['title'];
                                $date = $row['created_at'];
                                echo '<tr>
          <th scope="row">' . $id . '</th>
          <td>' . $pid . '</td>
          <td> <img src="'.settings()['homepage'].'productimg/'.$name.'" width="100px" height="80px" alt="loading..."> </td>
          <td>' . $name . '</td>
          <td>' . $date . '</td>
            <td>
                <a class=" btn btn-outline-primary  text-decoration-none" href="image_update.php?updateid=' . $id . '">Update</a>
            </td>
            <td>
                <a class="btn btn-outline-danger  text-decoration-none" href="image_delete.php?deleteid=' . $id . '">Delete</a>
          
            </td>
        </tr>';
                            }
                        }

                        ?>

                    </tbody>
                </table>
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