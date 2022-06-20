<?php
session_start();
$yname = $_POST["yName"];//html component id yi postun içine yaz
$ypass = $_POST["yPass"];
$conn="";
include("mysqlConnection.php");


$stmt = $conn->prepare("select * from authorities where a_username= :yname and a_pass= :ypass;");
$stmt->bindParam(':yname',$yname);
$stmt->bindParam(':ypass',$ypass);
$stmt->execute();

$authorities=$stmt->fetch();
//print_r($customers);

if($authorities['a_pass'] === $ypass && $authorities['a_username']===$yname){
    echo "<script>console.log('Başarıyla Giriş Yapıldı');</script>";
    $_SESSION["yName"]=$yname;
    $_SESSION["yPass"]=$ypass;
    date_default_timezone_set("Europe/Istanbul");
    $datetime=date("Y-m-d H:i:s");
    $stmtLastLogin=$conn->prepare("UPDATE `authorities` SET `a_last_login` = '$datetime' WHERE (`a_id` = :a_id);");
    $stmtLastLogin->bindParam(':a_id',$authorities["a_id"]);
    $stmtLastLogin->execute();
}else{
//    echo "".$customers['c_pass']. "- $upass || ".$customers['c_name']. "- $uname";
    echo "<script>console.log('Kullanıcı Adı Veya Şifre Bulunamadı');</script>";
    header("Location: ./index.php?sessionerror=2");
    exit();
}
$conn = null;
header("Location: ./yetkili.php");
?>
