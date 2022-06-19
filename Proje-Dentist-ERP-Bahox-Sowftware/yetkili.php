<?php
session_start();
if (!isset($_SESSION["yName"])) {
    header("Location: ./index.php");
    exit();
}
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
    <link rel="stylesheet" href="css/yetkili.css">
</head>
<body>

<nav class="navbar navbar sticky-top bg-secondary bg-gradient flex-md-nowrap p-0">
    <span class="navbar-brand col-sm-3 col-md-2 mr-0 text-center text-dark fw-bolder">Bahox Dentist ERP</span>
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
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link active">
                                <span data-feather="users"></span>
                                <span class="sr-only">Müşteriler</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col col-md-10 ">
            <div id="dataTableUpdtTablecss" class="dataTableUpdtTableCustom my-4 mx-4">
                <h3 class="text-center">Tüm Müşteriler</h3>
                <table id="yetkiliAllkullaniciTable"
                       class="table table-striped table-bordered table-hover">
                    <thead class="thead">
                    <tr>
                        <th class="th-sm ">Id
                        </th>
                        <th class="th-sm">Ad
                        </th>
                        <th class="th-sm">Soyad
                        </th>
                        <th class="th-sm">Tc
                        </th>
                        <th class="th-sm">Tel
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Sisteme Son Giriş
                        </th>
                        <th class="th-sm">Eylem
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteUser" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-success d-flex  fade show my-0 mx-0" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <div>Kullanıcı Başarıyla Silindi.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalUpdateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Müşteri Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="guncelleModalClose()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="kullanciUpdate">
                <div class="row g-0">
                    <div class="container-fluid text-end" id="kullaniciUpdateBasarili"
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
                    <div class="container text-end" id="kullaniciUpdateHata" style="display: none">
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
                                    <h2 class="login-heading mb-4 text-center" id="c_id_form">X</h2>
                                    <form method="POST" onsubmit="return false;"
                                          id="updateCusForm" name="updateCusForm">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uNameReelUpdate"
                                                   name="uNameReelUpdate"
                                                   placeholder="Kimlikte Yazan Adınızı Giriniz" required>
                                            <label for="uNameReelUpdate">
                                                Ad
                                                <span class="text-info ms-2">(Kimlikte Yazan Adınızı Giriniz)</span>
                                            </label>
                                            <div class="invalid-feedback">Gerçek Adınızı Giriniz!
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uSurnameReelUpdate"
                                                   name="uSurnameReelUpdate"
                                                   placeholder="Kimlikte Yazan Soy Adınızı Giriniz"
                                                   required>
                                            <label for="uSurnameReelUpdate">
                                                Soyad
                                                <span class="text-info ms-2">(Kimlikte Yazan Soy Adınızı Giriniz)</span>
                                            </label>
                                            <div class="invalid-feedback">Gerçek Soy Adınızı
                                                Giriniz!
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uTCUpdate"
                                                   name="uTCUpdate"
                                                   oninput="this.value = tcFormat(this.value)"
                                                   pattern="[0-9]{11}"
                                                   maxlength="11" minlength="11"
                                                   placeholder="TC numaranızı giriniz"
                                                   required>
                                            <label for="uTCUpdate">
                                                Tc
                                                <span class="text-info ms-2">(Tc numaranızı giriniz)</span>
                                            </label>
                                            <div class="invalid-feedback">TC no hatalı girildi!
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="uTelUpdate"
                                                   name="uTelUpdate"
                                                   oninput="this.value = phoneFormat(this.value)"
                                                   pattern="[(]{1}[0-9]{3}[)]{1} [0-9]{3}-[0-9]{4}"
                                                   maxlength="14"
                                                   minlength="14"
                                                   placeholder="Başında Sıfır Olmadan Telefon Numaranızı Giriniz"
                                                   required>
                                            <label for="uTelUpdate">
                                                Tel
                                                <span class="text-info ms-2">(Telefon Numaranızı Giriniz)</span>
                                                <span class="text-warning ms-2">(Örn: (535) 033-0805)</span>
                                            </label>
                                            <div class="invalid-feedback">Geçerli bir telefon
                                                numarası
                                                giriniz!
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="uEmailUpdate"
                                                   name="uEmailUpdate"
                                                   placeholder="Email Adresinizi Giriniz" required>
                                            <label for="uEmailUpdate">
                                                Email
                                                <span class="text-info ms-2">(Email Adresinizi Giriniz)</span>
                                                <span class="text-warning ms-2">(Örn: example@gmail.com)</span>
                                            </label>
                                            <div class="invalid-feedback">Geçerli Bir Mail Adresi
                                                Giriniz!
                                            </div>
                                        </div>
                                        <div class="text-md-center">
                                            <button class="btn btn btn-primary" id="musteriGuncellePostBtn"
                                                    name="musteriGuncellePostBtn"
                                                    type="button" onsubmit="return false;">Müşteriyi
                                                Güncelle
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
                    Çıkış Yap
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
<script src="js/yetkili.js"></script>

</body>

</html>
<?php
if (!empty($_GET['success'])) {
    if ($_GET['success'] === 'true') {
        echo "<script>$(document).ready(function(){
        $('#modalDeleteUser').modal('show');});</script>";

    }

}
include("mysqlConnection.php");

/** @var PDO $conn */
$stmt = $conn->query("select * from customer");
$customers = $stmt->fetchAll();
foreach ($customers as $value) {
    echo "<script>
    var tbodyRef = document.getElementById('yetkiliAllkullaniciTable').getElementsByTagName('tbody')[0];
    var row = tbodyRef.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    cell8.classList.add('form-group');
    var text1 = document.createTextNode('" . $value['c_id'] . "');
    var text2 = document.createTextNode('" . $value['c_name'] . "');
    var text3 = document.createTextNode('" . $value['c_surname'] . "');
    var text4 = document.createTextNode('" . $value['c_tcno'] . "');
    var text5 = document.createTextNode('" . $value['c_tel'] . "');
    var text6 = document.createTextNode('" . $value['c_email'] . "');
    var text7 = document.createTextNode('" . $value['c_last_login'] . "');
    var text8 = document.createTextNode('Git');
    var text9 = document.createTextNode('Güncelle');
    var text10 = document.createTextNode('Sil');
    var button1 = document.createElement('a');    
    var button2 = document.createElement('BUTTON');
    var button3 = document.createElement('a');
    button1.appendChild(text8);
    button2.appendChild(text9);
    button3.appendChild(text10);
    button1.href='./yetkiliGitKullanici.php?c_id='+" . $value['c_id'] . ";
    button2.id='btnUpdate_'+" . $value['c_id'] . ";
    button2.type='button';        
    button2.onclick= function(){
        guncelleModalOpen();         
         var c_id=" . $value['c_id'] . ";
         document.cookie='c_id='+c_id;  
         document.getElementById('c_id_form').innerHTML= c_id;
         var c_id_form= document.getElementById('c_id_form').innerHTML;
         if(getCookie('c_id')!==getCookie('c_id_old')){
            reValidUpdateElement();
         }else{
            cookieStatUp=getCookie('statUp');
            if(cookieStatUp==='1'){
                document.getElementById('kullaniciUpdateHata').style.display='none';
                document.getElementById('kullaniciUpdateBasarili').style.display='block';
            }else if(cookieStatUp==='-1'){
                document.getElementById('kullaniciUpdateHata').style.display='block';
                document.getElementById('kullaniciUpdateBasarili').style.display='none';
            }else{
                console.log('error cookieStatUp');
            }
         }
         $.ajax({
            url: './ajaxPostScript.php',
            method:'POST', 
            data:{getuserc_id: c_id},
            success:function(response){
                var customer=JSON.parse(response);      
                   
                $('#uNameReelUpdate').val(customer.c_name);
                $('#uSurnameReelUpdate').val(customer.c_surname);
                $('#uTCUpdate').val(customer.c_tcno);
                $('#uTelUpdate').val(customer.c_tel);
                $('#uEmailUpdate').val(customer.c_email); 
            },
            error:function(response){
                alert('error:'+response);
            }
         });
    };                
    button3.href='./yetkiliSilKullanici.php?c_id='+" . $value['c_id'] . ";
    button1.classList.add('btn','btn-outline-primary','my-2' ,'mx-2');
    button2.classList.add('btn','btn-outline-success','my-2','mx-2');
    button3.classList.add('btn','btn-outline-danger','my-2','mx-2');
    cell1.id='c_id'+" . $value['c_id'] . ";
    cell2.id='c_name'+" . $value['c_id'] . ";
    cell3.id='c_surname'+" . $value['c_id'] . ";
    cell4.id='c_tcno'+" . $value['c_id'] . ";
    cell5.id='c_tel'+" . $value['c_id'] . ";
    cell6.id='c_email'+" . $value['c_id'] . ";    
    cell1.appendChild(text1);
    cell2.appendChild(text2);
    cell3.appendChild(text3);
    cell4.appendChild(text4);
    cell5.appendChild(text5);
    cell6.appendChild(text6);
    cell7.appendChild(text7);
    cell8.appendChild(button1);
    cell8.appendChild(button2);
    cell8.appendChild(button3);
    </script>";
}
if (!empty($_COOKIE['c_id'])) {
    echo "<script>
            document.getElementById('musteriGuncellePostBtn').onclick= function(){                
                var c_id_form=document.getElementById('c_id_form').innerHTML;
                document.cookie ='c_id_old='+c_id_form;
                $.ajax({
                        url: './ajaxPostScriptUpdteCstmr.php',
                        method:'POST', 
                        data:{
                               c_id: c_id_form,
                               c_name: $('#uNameReelUpdate').val(),
                               c_surname: $('#uSurnameReelUpdate').val(),
                               c_tcno: $('#uTCUpdate').val(),
                               c_tel: $('#uTelUpdate').val(),
                               c_email: $('#uEmailUpdate').val()                     
                             },
                        success:function(response){
                            var c_UpdtedPhp = JSON.parse(response);
                            if (c_UpdtedPhp.updateuser == '-4') {
                                document.getElementById('uNameReelUpdate').classList.add('is-invalid');
                            }
                            if (c_UpdtedPhp.updateuser == '-5') {
                                document.getElementById('uSurnameReelUpdate').classList.add('is-invalid');
                            }
                            if (c_UpdtedPhp.updateuser == '-6') {
                                document.getElementById('uTCUpdate').classList.add('is-invalid');
                            }
                            if (c_UpdtedPhp.updateuser == '-7') {
                                document.getElementById('uTelUpdate').classList.add('is-invalid');
                            }
                            if (c_UpdtedPhp.updateuser == '-8') {
                                document.getElementById('uEmailUpdate').classList.add('is-invalid');
                            }
                            
                            if(c_UpdtedPhp.updateuserRes == '1'){
                                document.cookie='statUp=1';
                                document.getElementById('kullaniciUpdateHata').style.display='none';
                                document.getElementById('kullaniciUpdateBasarili').style.display='block';
                                document.getElementById('uNameReelUpdate').classList.remove('is-invalid')
                                document.getElementById('uSurnameReelUpdate').classList.remove('is-invalid');
                                document.getElementById('uTCUpdate').classList.remove('is-invalid');
                                document.getElementById('uTelUpdate').classList.remove('is-invalid');
                                document.getElementById('uEmailUpdate').classList.remove('is-invalid');                                      
                                document.getElementById('uEmailUpdate');
                                restoreDataTableUpdate(c_id_form);
                            }
                            if(c_UpdtedPhp.updateuserRes == '-1'){
                                document.cookie='statUp=-1';
                                document.getElementById('kullaniciUpdateBasarili').style.display='none';
                                 document.getElementById('kullaniciUpdateHata').style.display='block';    
                                 
                            }
                        },
                        error:function(response){
                            alert('error:'+response);
                        }
                       });
             };
         </script>";

}
$conn = null;
?>

