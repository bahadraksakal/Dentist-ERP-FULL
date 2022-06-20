<?php
session_start();
if (!isset($_SESSION["yName"]) && !isset($_SESSION["uName"])) {
    header("Location: ./index.php");
    exit();
}
include ("mysqlConnection.php");
/** @var PDO $conn */

//"UPDATE examination_processed SET `tooth".$_POST['tooth']."` = :toothFlag, `explanation_".$_POST['tooth']."` = :explanation, `price_".$_POST['tooth']."` = :price WHERE (`examination_id` = :examination_id);"
//$stmt->bindParam(':toothFlag', $_POST['toothFlag']);
//$stmt->bindParam(':explanation,', $_POST['explanation,']);
//$stmt->bindParam(':price', $_POST['price']);

$stmt = $conn->prepare("SELECT tooth".$_POST['dis_no']." as tooth ,explanation_".$_POST['dis_no']." as explanation ,price_".$_POST['dis_no']." as price FROM examination_processed where examination_id=:examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->execute();
$examination_detay_teeht = $stmt->fetch(PDO::FETCH_ASSOC);
echo "".json_encode($examination_detay_teeht);