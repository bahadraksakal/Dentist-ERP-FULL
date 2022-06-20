<?php

session_start();
if (preg_match('/^[a-zA-Z0-9._-]+$/', $_POST['yNameKayit']) == 0) {
    header("Location: ./index.php?createuser=-2");
    exit('Kullanıcı Adı Geçerli Değil');
}
if (strlen($_POST['yPassKayit']) < 8) {
    header("Location: ./index.php?createuser=-3");
    exit('Şifre 8 karakterden fazla olamalı !');
}
if (preg_match('/^[a-zA-Z\p{L}]+$/u', $_POST['yNameReel']) == 0) {
    header("Location: ./index.php?createuser=-4");
    exit('Adınız Geçerli Değil');
}
if (preg_match('/^[a-zA-Z\p{L}]+$/u', $_POST['ySurnameReel']) == 0) {
    header("Location: ./index.php?createuser=-5");
    exit('Soy Adınız Geçerli Değil');
}
if (preg_match("/^[0-9]{11}$/", $_POST['yTC']) == 0) {
    header("Location: ./index.php?createuser=-6");
    exit('Geçerli Bir Tc giriniz!');
}
if (preg_match("/^[(]{1}+[0-9]{3}+[)]{1}+[ ]{1}+[0-9]{3}+[-]{1}+[0-9]{4}$/", $_POST['yTel']) == 0) {
    header("Location: ./index.php?createuser=-7");
    exit('Telefon Numarası Geçersiz !');
}
if (!filter_var($_POST['yEmail'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ./index.php?createuser=-8");
    exit('Geçerli bir email giriniz!');
}
include("mysqlConnection.php");
/** @var PDO $conn */
$stmt = $conn->prepare("INSERT INTO authorities (`a_name`, `a_surname`, `a_tcno`, `a_username`, `a_pass`, `a_tel`, `a_email`) VALUES (:a_name,:a_surname,:a_tc_no,:a_username,:a_pass,:a_tel,:a_email);
");
$stmt->bindParam(':a_name', $_POST["yNameReel"]);
$stmt->bindParam(':a_surname', $_POST["ySurnameReel"]);
$stmt->bindParam(':a_username', $_POST["yNameKayit"]);
$stmt->bindParam(':a_pass', $_POST["yPassKayit"]);
$stmt->bindParam(':a_tel', $_POST["yTel"]);
$stmt->bindParam(':a_email', $_POST["yEmail"]);
$stmt->bindParam(':a_tc_no', $_POST["yTC"]);
$result = $stmt->execute();
if ($result === false) {
    header("Location: ./index.php?createuser=-1");
    exit('Hata Kayıt Oluşturulamadı!');
} else {
    $conn = null;
    header("Location: ./index.php?createuser=1");
}

?>


