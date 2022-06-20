<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}
include("mysqlConnection.php");
/** @var PDO $conn */

$stmt = $conn->prepare("SELECT examination_id FROM customer_examination WHERE c_id= :c_id ;");
$stmt->bindParam(':c_id', $_GET["c_id"]);
$stmt->execute();
$mysterininTumMuayaneIdleri = $stmt->fetchAll();
foreach ($mysterininTumMuayaneIdleri as $value) {
    $stmt = $conn->prepare("DELETE FROM examination_processed WHERE (examination_id = :ex_id);");
    $stmt->bindParam(':ex_id', $value['examination_id']);
    $stmt->execute();
}

$stmt = $conn->prepare("DELETE FROM customer_examination WHERE (c_id = :c_id);");
$stmt->bindParam(':c_id', $_GET["c_id"]);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM customer WHERE c_id= :c_id ;");
$stmt->bindParam(':c_id', $_GET["c_id"]);
$stmt->execute();

header("Location: ./yetkili.php?success=true");
?>
