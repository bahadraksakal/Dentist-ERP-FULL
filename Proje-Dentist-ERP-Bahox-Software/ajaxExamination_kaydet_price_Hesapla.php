<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}

$flag=false;
if (!empty($_POST['examination_id'])) {
    $flag = true;
    $_GET['disDetayKayit'] = '1';
    if (preg_match("/^[0-1]{1}$/", $_POST['tooth']) === 0) {
        $_GET['disDetayKayit'] = '-2';
        $flag = false;
    }
    if (preg_match("/^[0-9]{1,12}$/", $_POST['price']) === 0) {
        $_GET['disDetayKayit'] = '-3';
        $flag = false;
    }
    if (!$flag) {
        $_GET['disKayitSonuc'] = '-1';
        $obj = array('disKayitSonuc' => $_GET['disKayitSonuc'],'disDetayKayit'=>$_GET['disDetayKayit']);
        echo "" . json_encode($obj);
        exit();
    }
}


include("mysqlConnection.php");
/** @var PDO $conn */

$stmt = $conn->prepare("SELECT * FROM examination_processed where examination_id=:examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->execute();
$examination_detay_teeht = $stmt->fetch();

$totalPrice = 0;
for ($i = 1; $i <= 32; $i++) {
    if ('price_' . $i === 'price_' . $_POST['dis_no']) {
        continue;
    }
    $totalPrice += (int)$examination_detay_teeht['price_' . $i];
}


if (!empty($_POST['price'])) {
    $totalPrice += (int)$_POST['price'];
}
$stmt = $conn->prepare("UPDATE examination_processed SET examination_price = :totalPrice, tooth" . $_POST['dis_no'] . " = :tooth, explanation_" . $_POST['dis_no'] . " = :explanation, price_" . $_POST['dis_no'] . " = :price WHERE examination_id=:examination_id;");
$stmt->bindParam(':totalPrice', $totalPrice);
$stmt->bindParam(':tooth', $_POST['tooth']);
$stmt->bindParam(':explanation', $_POST['explanation']);
$stmt->bindParam(':price', $_POST['price']);
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$stmt->execute();

$stmt = $conn->prepare("SELECT examination_price,tooth" . $_POST['dis_no'] . " as tooth ,explanation_" . $_POST['dis_no'] . " as explanation ,price_" . $_POST['dis_no'] . " as price FROM examination_processed where examination_id=:examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$result=$stmt->execute();
$examination_detay_teeht = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT examination_price_payable,examination_price_paided,examination_price from customer_examination where examination_id = :examination_id");
$stmt->bindParam(':examination_id', $_POST['examination_id']);
$result=$stmt->execute();
$paided_payable_res = $stmt->fetch(PDO::FETCH_ASSOC);
if($result){
    $_GET['disKayitSonuc'] = '1';
}else{
    $_GET['disKayitSonuc'] = '-1';
}
$obj = array('disKayitSonuc' => $_GET['disKayitSonuc'],'disDetayKayit'=>$_GET['disDetayKayit']);
echo "" . json_encode($examination_detay_teeht+$obj+$paided_payable_res);