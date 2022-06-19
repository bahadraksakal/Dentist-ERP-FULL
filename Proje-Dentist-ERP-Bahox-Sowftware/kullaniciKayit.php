<?php

session_start();
if (preg_match('/^[a-zA-Z0-9._-]+$/', $_POST['uNameKayit']) == 0) {
    header("Location: ./index.php?createuser=-2");
    exit('Kullanıcı Adı Geçerli Değil');
}
if (strlen($_POST['uPassKayit']) < 8) {
    header("Location: ./index.php?createuser=-3");
    exit('Şifre 8 karakterden fazla olamalı !');
}
if (preg_match('/^[a-zA-Z\p{L}]+$/u', $_POST['uNameReel']) == 0) {
    header("Location: ./index.php?createuser=-4");
    exit('Adınız Geçerli Değil');
}
if (preg_match('/^[a-zA-Z\p{L}]+$/u', $_POST['uSurnameReel']) == 0) {
    header("Location: ./index.php?createuser=-5");
    exit('Soy Adınız Geçerli Değil');
}
if (preg_match("/^[0-9]{11}$/", $_POST['uTC']) == 0) {
    header("Location: ./index.php?createuser=-6");
    exit('Geçerli Bir Tc giriniz!');
}
if (preg_match("/^[(]{1}+[0-9]{3}+[)]{1}+[ ]{1}+[0-9]{3}+[-]{1}+[0-9]{4}$/", $_POST['uTel']) == 0) {
    header("Location: ./index.php?createuser=-7");
    exit('Telefon Numarası Geçersiz !');
}
if (!filter_var($_POST['uEmail'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ./index.php?createuser=-8");
    exit('Geçerli bir email giriniz!');
}


// "/^[(]{1}+[0-9]{3}+[)]{1}+[ ]{1}+[0-9]{3}+[-]{1}+[0-9]{4}$/"
//"/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/"
$uNameKayit = $_POST["uNameKayit"];
$uPassKayit = $_POST["uPassKayit"];
$uNameReel = $_POST["uNameReel"];
$uSurnameReel = $_POST["uSurnameReel"];
$uTC = $_POST["uTC"];
$uTel = $_POST["uTel"];
$uEmail = $_POST["uEmail"];

include("mysqlConnection.php");
//index.php ye js kodu ekle   girilen iki password u karşılaştırsın. eşleme olmazsa kırmızı yaksın

/** @var PDO $conn */
$stmt= $conn->prepare("INSERT INTO `customer`(`c_username`, `c_pass`,`c_name`, `c_surname`, `c_tcno`,  `c_tel`, `c_email`) VALUES (:uNameKayit, :uPassKayit, :uNameReel, :uSurnameReel, :uTC, :uTel, :uEmail);");
$stmt->bindParam(':uNameKayit',$uNameKayit);
$stmt->bindParam(':uPassKayit',$uPassKayit);
$stmt->bindParam(':uNameReel',$uNameReel);
$stmt->bindParam(':uSurnameReel',$uSurnameReel);
$stmt->bindParam(':uTC',$uTC);
$stmt->bindParam(':uTel',$uTel);
$stmt->bindParam(':uEmail',$uEmail);
$result=$stmt->execute();
if($result===false){
    header("Location: ./index.php?createuser=-1");
    exit('Hata Kayıt Oluşturulamadı!');
}else{
    $conn = null;
    header("Location: ./index.php?createuser=1");
}

?>

