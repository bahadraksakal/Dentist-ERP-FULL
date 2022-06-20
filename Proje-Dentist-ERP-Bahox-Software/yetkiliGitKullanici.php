<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}
require("mysqlConnection.php");
/** @var PDO $conn */

$stmt = $conn->prepare("select * from customer where c_id= :c_id");
$stmt->bindParam(':c_id', $_GET['c_id']);
$stmt->execute();
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
$name_surname = "" . $customer['c_name'] . " " . $customer['c_surname'];
?>
    <html lang="tr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Bahox"/>
    <meta name="author" content="Bahadr Aksakal"/>
    <title>Yetkili Panel</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/dt-1.12.1/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/yetkiliGitKullanici.css">
</head>
<body>

<nav class="navbar navbar sticky-top bg-secondary bg-gradient flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center text-dark fw-bolder" href="#">Bahox Dentist ERP</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap text-dark fw-bolder">
            <a class="nav-link text-dark " href="exit.php">Çıkış Yap</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col col-md-2">
            <nav class="col col-md-2 d-none d-md-block sidebar" style="background-color: #B5B6BA;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column my-3">
                        <li class="nav-item">
                            <a class="nav-link active">
                                <span data-feather="user-check"></span>
                                <span class="sr-only" id="customerInfoNav">(name + surname)'ın bilgileri</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="yetkili.php">
                                <span data-feather="users"></span>
                                Müşteriler Menüsüne Geri Dön
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col col-md-10 ">
            <div class="row">
                <div id="canvasFDISystem" class="mx-auto">
                    <img class="rounded mx-auto d-block" src="img/FDINumberingSystem.png" alt="FDINumberingSystem"
                         width="200px" height="200px"/>
                </div>
            </div>
            <div class="row m-3">
                <div id="customerMuayenelerTableDataDetaylarcss" class="m-3 dataTableUpdtTableCustom " style="width: %100">
                    <h3 class="text-center">Muayene Detayları</h3>
                    <button class="btn btn-success m-3 float-end">Diş Detayları Düzenle(Kodu Henüz Yazılmadı)</button>
                    <table id="customerMuayenelerTableDataDetaylar"
                           class="table table-striped table-bordered table-hover">
                        <thead class="thead">
                        <tr>
                            <th class="th-sm ">Muayene Id
                            </th>
                            <th class="th-sm">Ek İşlemler
                            </th>
                            <th class="th-sm">Ek İşlem Ücreti
                            </th>
                            <th class="th-sm">İşlemler
                            </th>
                            <th class="th-sm">Toplam Ücret
                            </th>
                            <th class="th-sm">Muayene Tarihi
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row m-3">
                    <div id="customerMuayenelerTableDatacss" class="m-3 dataTableUpdtTableCustom" style="width: %100">
                        <h3 class="text-center"><?php echo $name_surname; ?> İsimli Müşterinin Tüm Muayeneleri</h3>
                        <table id="customerMuayenelerTableData"
                               class="table table-striped table-bordered table-hover">
                            <thead class="thead">
                            <tr>
                                <th class="th-sm ">Muayene Id
                                </th>
                                <th class="th-sm">Müşteri Id
                                </th>
                                <th class="th-sm">Muayene Özeti
                                </th>
                                <th class="th-sm">Muayene Ücreti
                                </th>
                                <th class="th-sm">Ödenen Miktar
                                </th>
                                <th class="th-sm">Ödecenek Miktar
                                </th>
                                <th class="th-sm">Muayene Tarihi
                                </th>
                                <th class="th-sm">İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalDisGuncelle" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Dişe Uygulanan İşlem Detayları</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="guncelleModalClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalDisGuncelleDataBody">
                    <div class="row g-0">
                        <div class="container-fluid text-end" id="modalDisGuncellemeBasariliAlert"
                                 style="display: none">
                        <div class="alert alert-success d-inline-flex p-2 text-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor"
                                        viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                 aria-label="Success:">
                                <use xlink:href="#check-circle-fill"/>
                            </svg>
                            <div>
                                Kullanıcı Başarıyla Güncellendi.
                            </div>
                        </div>
                    </div>
                    <div class="container text-end" id="modalDisGuncellemeHataliAlert" style="display: none">
                        <div class="alert alert-danger d-inline-flex p-2 text-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor"
                                        viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                 aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"/>
                            </svg>
                            <div>
                                Müşteri Güncellenemedi, Lütfen Tekrar Deneyiniz !
                            </div>
                        </div>
                    </div>
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-16 col-lg-16 mx-auto">
                                    <h2 class="login-heading mb-4 text-center" id="dis_numarasi_h2">X</h2>
                                    <form method="POST" onsubmit="return false;"
                                          id="modalDisGuncelleForm" name="modalDisGuncelleForm">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="disFlagForm"
                                                   name="disFlagForm"
                                                   placeholder="Diş işlem Gördüyse 1 Görmediyse 0 Giriniz"
                                                   oninput="this.value = disFlagFormFormat(this.value)" required>
                                            <label for="disFlagForm">
                                                Diş İşlem Görme Durumu:
                                                <span class="text-info ms-2">(Diş işlem Gördüyse 1 Görmediyse 0 Giriniz)</span>
                                            </label>
                                            <div class="invalid-feedback">Sadece 0 Yada 1 Girebilirsiniz !
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="disYapilanIslemForm" rows="3"
                                                              name="disYapilanIslemForm"
                                                              placeholder="Diş Üzerinde Yaptığınız İşlemleri Yazınız"
                                                              required>
                                                    </textarea>
                                            <label for="disYapilanIslemForm">
                                                Dişe Yapılan İşlem:
                                                <span class="text-info ms-2">(Diş Üzerinde Yaptığınız İşlemleri Yazınız)</span>
                                            </label>
                                            <div class="invalid-feedback"> Dişe Yapılam İşlem Bölümünde Hata, Tekrar
                                                Deneyiniz!
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="disUcretForm"
                                                   name="disUcretForm"
                                                   placeholder="Yapılan İşlemlerin Tutarını Giriniz" required>
                                            <label for="disUcretForm">
                                                Dişe Uygulanan İşlemlerin Ücret:
                                                <span class="text-info ms-2">(Yapılan İşlemlerin Tutarını Giriniz)</span>
                                            </label>
                                            <div class="invalid-feedback">Sadece Rakam Girebilirsiniz !
                                            </div>
                                        </div>

                                        <div class="text-md-center">
                                            <button class="btn btn btn-primary" id="modalDisGuncelleFormPostBtn"
                                                    name="modalDisGuncelleFormPostBtn"
                                                    type="button" onsubmit="return false;">Kaydet
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="guncelleModalClose()">
                    Pencereyi Kapat
                </button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/dt-1.12.1/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
<script src="js/yetkiliGitKullanici.js"></script>
</body>
<?php
echo "<script>fillNavBarUserİnfo('" . $name_surname . "');</script>";

$stmt = $conn->prepare("select * from customer_examination where c_id= :c_id order by examination_date desc");
$stmt->bindParam(':c_id', $_GET['c_id']);
$stmt->execute();
$customer_examination = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (empty($customer_examination)) {
    $stmt = $conn->prepare("INSERT INTO customer_examination (`c_id`) VALUES (:c_id);");
    $stmt->bindParam(':c_id', $_GET['c_id']);
    $stmt->execute();

    $stmt = $conn->prepare("select * from customer_examination where c_id= :c_id order by examination_date desc");
    $stmt->bindParam(':c_id', $_GET['c_id']);
    $stmt->execute();
    $customer_examination = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$stmt = $conn->prepare("select * from examination_processed where examination_id = :examination_id");
$stmt->bindParam(':examination_id', $customer_examination[0]['examination_id']);
$stmt->execute();
$examination_detay = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($examination_detay)) {
    $stmt = $conn->prepare("INSERT INTO examination_processed (`examination_id`, `examination_price`, `additional_actions`, `additional_actions_price`) VALUES (:examination_id, '0', ' ', '0');");
    $stmt->bindParam(':examination_id', $customer_examination[0]['examination_id']);
    $stmt->execute();

    $stmt = $conn->prepare("select * from examination_processed where examination_id = :examination_id");
    $stmt->bindParam(':examination_id', $customer_examination[0]['examination_id']);
    $stmt->execute();
    $examination_detay = $stmt->fetch(PDO::FETCH_ASSOC);
    //js ile tablo güncelle
}
//"<script>console.log('test: ".$examination_detay['examination_id']."',`".$examination_detay['additional_actions']."`,'".$examination_detay['additional_actions_price']."','".$examination_detay['examination_price_paided']."','".$examination_detay['examination_price']."','".$customer_examination[0]['examination_date']."');</script>\n";
echo "<script>fillTableMuayenelerDetaylar('" . $examination_detay['examination_id'] . "',`" . $examination_detay['additional_actions'] . "`,'" . $examination_detay['additional_actions_price'] . "','" . $examination_detay['examination_price'] . "','" . $customer_examination[0]['examination_date'] . "');</script>\n";

foreach ($customer_examination as $value) {
    echo "<script>fillTableMuayeneler('" . $value['examination_id'] . "',
                                    '" . $_GET['c_id'] . "',
                                    `" . $value['examination_summary'] . "`,
                                    '" . $value['examination_price'] . "',
                                    '" . $value['examination_price_paided'] . "',
                                    '" . $value['examination_price_payable'] . "',
                                    '" . $value['examination_date'] . "',
                                    `" . $examination_detay['additional_actions'] . "`,
                                    '" . $examination_detay['additional_actions_price'] . "');</script>\n";
}

