<?php
session_start();
if (!isset($_SESSION["uName"]) || !isset($_SESSION["uId"])) {
    header("Location: ./index.php?c_id=" . $_GET['c_id']);
    exit();
}
include ("mysqlConnection.php");
/** @var PDO $conn */
$stmt = $conn->prepare("select * from customer_examination where examination_id = :examination_id and :c_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->bindParam(':c_id', $_SESSION["uId"]);
$stmt->execute();
$examination_odeme = $stmt->fetch(PDO::FETCH_ASSOC);

$examination_odeme['examination_price_paided']+=$_POST['odenenMiktar'];
$examination_odeme['examination_price_payable']=$examination_odeme['examination_price']-$examination_odeme['examination_price_paided'];

if((int)$examination_odeme['examination_price']<(int)$examination_odeme['examination_price_paided']){
    $obj=array('odemeError'=>'-1');
    echo "".json_encode($obj);
    exit();
}
if ((int)$_POST['odenenMiktar']<=0){
    $obj=array('odemeError'=>'-2');
    echo "".json_encode($obj);
    exit();
}


$stmt = $conn->prepare("UPDATE customer_examination SET examination_price_paided = :paided WHERE examination_id = :examination_id;");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->bindParam(':paided', $examination_odeme['examination_price_paided']);
$stmt->execute();



$stmt = $conn->prepare("select * from customer_examination where examination_id = :examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->execute();
$examination_odeme = $stmt->fetch(PDO::FETCH_ASSOC);

$obj=array('odemeSucces'=>'1');
echo "".json_encode($examination_odeme+$obj);