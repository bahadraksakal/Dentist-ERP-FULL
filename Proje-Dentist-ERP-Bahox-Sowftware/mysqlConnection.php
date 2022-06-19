<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id19011159_bahox_software_dentist_erp_db";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<script>console.log('Connect Eror');</script>";
    die("Connection failed: " . $e->getMessage());
}
?>