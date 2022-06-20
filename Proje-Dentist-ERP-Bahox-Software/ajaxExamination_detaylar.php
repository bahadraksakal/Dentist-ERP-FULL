<?php
session_start();
if (!isset($_SESSION["yName"]) && !isset($_SESSION["uName"])) {
    header("Location: ./index.php");
    exit();
}
include ("mysqlConnection.php");
/** @var PDO $conn */
$stmt = $conn->prepare("select * from examination_processed where examination_id = :examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->execute();
$examination_detay = $stmt->fetch(PDO::FETCH_ASSOC);
if (empty($examination_detay)){
    $stmt = $conn->prepare("INSERT INTO examination_processed (`examination_id`, `examination_price`, `additional_actions`, `additional_actions_price`) VALUES (:examination_id, '0', ' ', '0');");
    $stmt->bindParam(':examination_id', $_POST['examination_id']);
    $stmt->execute();

    $stmt = $conn->prepare("select * from examination_processed where examination_id = :examination_id");
    $stmt->bindParam(':examination_id', $_POST['examination_id']);
    $stmt->execute();
    $examination_detay = $stmt->fetch(PDO::FETCH_ASSOC);
}
echo "".json_encode($examination_detay);