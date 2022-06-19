<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}
include ("mysqlConnection.php");
/** @var PDO $conn */
$stmt = $conn->prepare("select * from customer where c_id= :c_id");
$stmt->bindParam(':c_id',$_POST['getuserc_id']);
$stmt->execute();
$customerUpdt=$stmt->fetch(PDO::FETCH_ASSOC);
echo "".json_encode($customerUpdt);
?>
