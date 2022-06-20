<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}
$_GET['updateuser']=1;
if (!empty($_POST["c_name"])) {
    $flag = true;
    if (preg_match('/^[a-z A-Z\p{L}]+$/u', $_POST['c_name']) == 0) {
        $_GET['updateuserRes'] = '-1';
        $_GET['updateuser'] = '-4';
        $flag = false;
    }
    if (preg_match('/^[a-zA-Z\p{L}]+$/u', $_POST['c_surname']) == 0) {
        $_GET['updateuserRes'] = '-1';
        $_GET['updateuser'] = '-5';
        $flag = false;
    }
    if (preg_match("/^[0-9]{11}$/", $_POST['c_tcno']) == 0) {
        $_GET['updateuserRes'] = '-1';
        $_GET['updateuser'] = '-6';
        $flag = false;
//        header("Location: ./yetkili.php?updateuserRes=-1&updateuser=-6");
        exit();
    }
    if (preg_match("/^[(]{1}+[0-9]{3}+[)]{1}+[ ]{1}+[0-9]{3}+[-]{1}+[0-9]{4}$/", $_POST['c_tel']) == 0) {
        $_GET['updateuserRes'] = '-1';
        $_GET['updateuser'] = '-7';
        $flag = false;
    }
    if (!filter_var($_POST['c_email'], FILTER_VALIDATE_EMAIL)) {
        $_GET['updateuserRes'] = '-1';
        $_GET['updateuser'] = '-8';
        $flag = false;
    }
    if ($flag) {
        $uNameReelUpdate = $_POST["c_name"];
        $uSurnameReelUpdate = $_POST["c_surname"];
        $uTCUpdate = $_POST["c_tcno"];
        $uTelUpdate = $_POST["c_tel"];
        $uEmailUpdate = $_POST["c_email"];
        $uC_id = $_POST["c_id"];

        include("mysqlConnection.php");
        /** @var PDO $conn */
        $stmt = $conn->prepare("UPDATE customer SET c_name = :c_name, c_surname = :c_surname, c_tcno = :c_tcno, c_tel = :c_tel, c_email = :c_email WHERE c_id = :c_id;");

        $stmt->bindParam(':c_name', $uNameReelUpdate);
        $stmt->bindParam(':c_surname', $uSurnameReelUpdate);
        $stmt->bindParam(':c_tcno', $uTCUpdate);
        $stmt->bindParam(':c_tel', $uTelUpdate);
        $stmt->bindParam(':c_email', $uEmailUpdate);
        $stmt->bindParam(':c_id', $uC_id);
        $result=$stmt->execute();
//        $customerUpdted=$stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            $_GET['updateuserRes'] = '-1';
//            header("Location: ./yetkili.php?updateuserRes=-1");
        } else {
            $_GET['updateuserRes'] = '1';
//            header("Location: ./yetkili.php?updateuserRes=1");
        }
        $conn = null;

    }
    $obj=array('updateuserRes'=>$_GET['updateuserRes'],'updateuser'=>$_GET['updateuser']);
    echo "".json_encode($obj);
}
?>