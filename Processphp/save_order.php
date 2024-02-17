<?php
include('./config.php');
session_start();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
echo "<pre>";
print_r($_SESSION['CART']);
echo "</pre>";
$data = "";
$tablenumber2 = $_POST['tablenumber2'];
$radio2 = $_POST['radio2'];
$date2 = $_POST['date2'];
 
foreach ($_SESSION['CART'] as $key => $value) {
    $sql = "INSERT INTO `co_orders`(`Date_Ord`, `TebleNum`, `menu`, `Qauntity`, `Status`) VALUES ('".$date2."','".$tablenumber2."','".$value['menu']."','".$value['qaunt']."','".$radio2."')";
    $insert = $conn->query($sql);
}
session_destroy();
header("Location: ../7saveinfo2.php");


?>