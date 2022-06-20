<?php

session_start();
$uname = $_POST["uName"];//html component id yi postun içine yaz
$upass = $_POST["uPass"];

include("mysqlConnection.php");
/** @var DOM $conn */
$stmt = $conn->prepare("select * from customer where c_username= :uname and c_pass= :upass;");
$stmt->bindParam(':uname', $uname);
$stmt->bindParam(':upass', $upass);
$stmt->execute();
$customers = $stmt->fetch();
//print_r($customers);

if ($customers['c_pass'] === $upass && $customers['c_username'] === $uname) {
    echo "<script>console.log('Başarıyla Giriş Yapıldı');</script>";
    $_SESSION["uName"] = $uname;
    $_SESSION["uPass"] = $upass;
    $_SESSION["uId"] = $customers["c_id"];
    $_SESSION["uReelName"] = $customers["c_name"];
    $_SESSION["uReelSurname"] = $customers["c_surname"];
    date_default_timezone_set("Europe/Istanbul");
    $datetime = date("Y-m-d H:i:s");
    $stmtLastLogin = $conn->prepare("UPDATE `customer` SET `c_last_login` = '$datetime' WHERE (`c_id` = :c_id);");
    $stmtLastLogin->bindParam(':c_id', $customers["c_id"]);
    $stmtLastLogin->execute();
} else {
//    echo "".$customers['c_pass']. "- $upass || ".$customers['c_name']. "- $uname";
    echo "<script>console.log('Kullanıcı Adı Veya Şifre Bulunamadı');</script>";
    header("Location: ./index.php?sessionerror=1");
    exit();
}


$conn = null;
header("Location: ./kullanici.php?c_id=" . $customers['c_id'] . "&&c_fullname=" . $customers['c_name'] . " " . $customers['c_surname']);
?>


<!--$data = $pdo->query("SELECT * FROM users")->fetchAll();-->
<!--// and somewhere later:-->
<!--foreach ($data as $row) {-->
<!--echo $row['name']."<br />\n";-->
<!--}-->