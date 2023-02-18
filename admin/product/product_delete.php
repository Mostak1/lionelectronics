<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\db;
$conn = db::connect();
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql = "delete from `products` where id = '$id'";
$result = $conn->query($sql);
if($result){
    // echo "Deleted successfully";
header('location:'.settings()['adminpage'].'/product/product_display.php');
}else{
    die(mysqli_error($conn));
}
}

?>