<?php
session_start();
if (isset($_SESSION["uName"]) && isset($_SESSION["uId"])){
    header("Location: ./kullanici.php?c_id=" . $_SESSION['uId'] . "&&c_fullname=" . $_SESSION['uReelName']. " " . $_SESSION['uReelSurname']);
    exit();
}
if (isset($_SESSION["yName"])) {
    header("Location: ./yetkili.php");
    exit();
}
?>
<html lang="tr">
<head>
    <title>Dentist ERP Bahox Software</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Bahox"/>
    <meta name="author" content="Bahadr Aksakal"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>

<div class="container-fluid ps-md-0" id="kullaniciGiris">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="container-fluid text-end" id="kullaniciKayitBasarili" style="display: none">
                <div class="alert alert-success d-inline-flex p-2 text-center" role="alert">
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
                    <div>
                        Ba??ar??yla Kay??t Oldunuz, Giri?? Yapabilirsiniz.
                    </div>
                </div>
            </div>
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 mx-auto">
                            <h2 class="login-heading mb-4 text-center text-white">Dentist ERP Bahox Software</h2>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciGiris()">Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciKayit()">Kay??t Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliGiris()">Yetkili Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliKayit()">Yetkili Kay??t Sayfas??</h3>
                            <!-- Sign In Form -->
                            <form action="kullaniciGiris.php" method="post">
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control" id="uName" name="uName"
                                           placeholder="Usarname" value="bahox">
                                    <label for="uName">Kullan??c?? Ad??</label>
                                    <div class="invalid-feedback" id="sessionFailedUname">Kullan??c?? Ad?? Hatal??
                                        Olabilir!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="uPass" name="uPass"
                                           placeholder="Password" value="12345">
                                    <label for="uPass">??ifre</label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">??ifre Hatal?? Olabilir!</div>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                        Beni Hat??rla
                                    </label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Giri?? Yap
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ps-md-0" id="kullaniciKayit" style="display: none">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="container-fluid text-end" id="kullaniciKayitHata" style="display: none">
                <div class="alert alert-danger d-inline-flex p-2 text-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    <div>
                        Kay??t Olu??turalamad??, L??tfen Tekrar Deneyiniz !
                    </div>
                </div>
            </div>
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 mx-auto">
                            <h2 class="login-heading mb-4 text-center text-white">Dentist ERP Bahox Software</h2>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciGiris()">Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciKayit()">Kay??t Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliGiris()">Yetkili Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliKayit()">Yetkili Kay??t Sayfas??</h3>
                            <!-- Sign In Form -->
                            <form action="kullaniciKayit.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-placeholder" id="uNameKayit"
                                           name="uNameKayit" placeholder="Kullan??c?? Ad??n??z?? Giriniz" required>
                                    <label for="uNameKayit">
                                        Kullan??c?? Ad??
                                        <span class="text-info ms-2">(Kullan??c?? Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir Kullan??c?? Ad??
                                        Girin!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="uPassKayit" name="uPassKayit"
                                           minlength="8" placeholder="??ifrenizi Giriniz" required>
                                    <label class="form-label" for="uPassKayit">
                                        ??ifre
                                        <span class="text-info ms-2">(??ifrenizi Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir ??ifre Girin!</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="uPassKayitCheck"
                                           name="uPassKayitCheck" minlength="8" placeholder="??ifrenizi Tekrar Giriniz"
                                           oninput="sifreCheck(this.value)"
                                           required>
                                    <label for="uPassKayitCheck">
                                        ??ifre Onayla
                                        <span class="text-info ms-2">(??ifrenizi Tekrar Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sifreCheckinvalid">??ifreler Ayn?? De??il!</div>
                                    <div class="valid-feedback" id="sifreCheckvalid">??ifreler Ayn?? </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="uNameReel" name="uNameReel"
                                           placeholder="Kimlikte Yazan Ad??n??z?? Giriniz" required>
                                    <label for="uNameReel">
                                        Ad
                                        <span class="text-info ms-2">(Kimlikte Yazan Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ger??ek Ad??n??z?? Giriniz!</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="uSurnameReel" name="uSurnameReel"
                                           placeholder="Kimlikte Yazan Soy Ad??n??z?? Giriniz" required>
                                    <label for="uSurnameReel">
                                        Soyad
                                        <span class="text-info ms-2">(Kimlikte Yazan Soy Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ger??ek Soy Ad??n??z?? Giriniz!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="uTC" name="uTC"
                                           oninput="this.value = tcFormat(this.value)" pattern="[0-9]{11}"
                                           maxlength="11" minlength="11" placeholder="TC numaran??z?? giriniz" required>
                                    <label for="uTC">
                                        Tc
                                        <span class="text-info ms-2">(Tc numaran??z?? giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">TC no hatal?? girildi!</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="uTel" name="uTel"
                                           oninput="this.value = phoneFormat(this.value)"
                                           pattern="[(]{1}[0-9]{3}[)]{1} [0-9]{3}-[0-9]{4}" maxlength="14"
                                           minlength="14" placeholder="Ba????nda S??f??r Olmadan Telefon Numaran??z?? Giriniz"
                                           required>
                                    <label for="uTel">
                                        Tel
                                        <span class="text-info ms-2">(Telefon Numaran??z?? Giriniz)</span>
                                        <span class="text-warning ms-2">(??rn: (535) 033-0805)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli bir telefon numaras??
                                        giriniz!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="uEmail" name="uEmail"
                                           placeholder="Email Adresinizi Giriniz" required>
                                    <label for="uEmail">
                                        Email
                                        <span class="text-info ms-2">(Email Adresinizi Giriniz)</span>
                                        <span class="text-warning ms-2">(??rn: example@gmail.com)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir Mail Adresi
                                        Giriniz!
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Kay??t Ol
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ps-md-0" id="yetkiliGiris" style="display: none">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 mx-auto">
                            <h2 class="login-heading mb-4 text-center text-white">Dentist ERP Bahox Software</h2>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciGiris()">Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciKayit()">Kay??t Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliGiris()">Yetkili Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliKayit()">Yetkili Kay??t Sayfas??</h3>
                            <!-- Sign In Form -->
                            <form action="yetkiliGiris.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="yName" name="yName"
                                           placeholder="Usarname" value="root">
                                    <label for="uName">Kullan??c?? Ad??</label>
                                    <div class="invalid-feedback" id="sessionFailedUname">Yetkili Kullan??c?? Ad?? Hatal??
                                        Olabilir!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="yPass" name="yPass"
                                           placeholder="Password" value="admin">
                                    <label for="uPass">??ifre</label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Yetkili ??ifre Hatal??
                                        Olabilir!
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMeYetkili">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                        Beni Hat??rla
                                    </label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Giri?? Yap
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ps-md-0" id="yetkiliKayit" style="display: none">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 mx-auto">
                            <h2 class="login-heading mb-4 text-center text-white">Dentist ERP Bahox Software</h2>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciGiris()">Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayKullaniciKayit()">Kay??t Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliGiris()">Yetkili Giri?? Sayfas??</h3>
                            <h3 class="btn btn-primary mb-3 " onclick="displayYetkiliKayit()">Yetkili Kay??t Sayfas??</h3>
                            <!-- Sign In Form -->
                            <form action="yetkiliKayit.php" method="post" >
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-placeholder" id="yNameKayit"
                                           name="yNameKayit" placeholder="Kullan??c?? Ad??n??z?? Giriniz" required>
                                    <label for="yNameKayit">
                                        Kullan??c?? Ad??
                                        <span class="text-info ms-2">(Kullan??c?? Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir Kullan??c?? Ad??
                                        Girin!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="yPassKayit" name="yPassKayit"
                                           minlength="8" placeholder="??ifrenizi Giriniz" required>
                                    <label class="form-label" for="yPassKayit">
                                        ??ifre
                                        <span class="text-info ms-2">(??ifrenizi Giriniz)</span>
                                    </label>
                                </div>
                                <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir ??ifre Girin!</div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="yPassKayitCheck"
                                           name="yPassKayitCheck" minlength="8" placeholder="??ifrenizi Tekrar Giriniz"
                                           oninput="sifreCheck2(this.value)"
                                           required>
                                    <label for="yPassKayitCheck">
                                        ??ifre Onayla
                                        <span class="text-info ms-2">(??ifrenizi Tekrar Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sifreCheckinvalid">??ifreler Ayn?? De??il!</div>
                                    <div class="valid-feedback" id="sifreCheckvalid">??ifreler Ayn?? </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="yNameReel" name="yNameReel"
                                           placeholder="Kimlikte Yazan Ad??n??z?? Giriniz" required>
                                    <label for="yNameReel">
                                        Ad
                                        <span class="text-info ms-2">(Kimlikte Yazan Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ger??ek Ad??n??z?? Giriniz!</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ySurnameReel" name="ySurnameReel"
                                           placeholder="Kimlikte Yazan Soy Ad??n??z?? Giriniz" required>
                                    <label for="ySurnameReel">
                                        Soyad
                                        <span class="text-info ms-2">(Kimlikte Yazan Soy Ad??n??z?? Giriniz)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ger??ek Soy Ad??n??z?? Girin!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="yTC" name="yTC"
                                           oninput="this.value = tcFormat(this.value)" pattern="[0-9]{11}"
                                           maxlength="11" minlength="11" placeholder="TC numaran??z?? giriniz" required>
                                    <label for="yTC">
                                        Tc
                                        <span class="text-info ms-2">(Tc numaran??z?? giriniz)</span>
                                        <div class="invalid-feedback" id="sessionFailedUpass">TC no hatal?? girildi!
                                        </div>
                                    </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="yTel" name="yTel"
                                           oninput="this.value = phoneFormat(this.value)"
                                           pattern="[(]{1}[0-9]{3}[)]{1} [0-9]{3}-[0-9]{4}" maxlength="14"
                                           minlength="14" placeholder="Ba????nda S??f??r Olmadan Telefon Numaran??z?? Giriniz"
                                           required>
                                    <label for="yTel">
                                        Tel
                                        <span class="text-info ms-2">(Telefon Numaran??z?? Giriniz)</span>
                                        <span class="text-warning ms-2">(??rn: (535) 033-0805)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli bir telefon numaras??
                                        giriniz!
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="yEmail" name="yEmail"
                                           placeholder="Email Adresinizi Giriniz" required>
                                    <label for="yEmail">
                                        Email
                                        <span class="text-info ms-2">(Email Adresinizi Giriniz)</span>
                                        <span class="text-warning ms-2">(??rn: example@gmail.com)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">Ge??erli Bir Mail Adresi
                                        Giriniz!
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="ySec" name="ySec"
                                           oninput="this.value=secFormat(this.value)" min="0" max="3"
                                           placeholder="Yetki Seviyesi" required>
                                    <label for="ySec">
                                        Yetki Seviyesi
                                        <span class="text-danger ms-2">(0-3 aras??nda yetki tan??mlay??n??z)</span>
                                    </label>
                                    <div class="invalid-feedback" id="sessionFailedUpass">0 ile 3 aras?? bir yetki
                                        tan??mlay??n!
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Kay??t Ol
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="js/index.js"></script>
</body>
</html>
<?php
if (!empty($_GET['sessionerror'])) {
    if ($_GET['sessionerror'] == 1) {
        echo "<script>document.getElementById('uName').classList.add('is-invalid');</script>";
        echo "<script>document.getElementById('uPass').classList.add('is-invalid');</script>";
    } else if ($_GET['sessionerror'] == 2) {
        echo "<script>document.getElementById('yName').classList.add('is-invalid');</script>";
        echo "<script>document.getElementById('yPass').classList.add('is-invalid');</script>";
        echo "<script>displayYetkiliGiris();</script>";
    }

}
if (!empty($_GET['createuser'])) {
    if ($_GET['createuser'] == 1) {
        echo "<script>document.getElementById('kullaniciKayitBasarili').style.display='block';</script>";
        echo "<script>displayKullaniciGiris();</script>";

    }
    if ($_GET['createuser'] == -1) {
        echo "<script>document.getElementById('kullaniciKayitHata').style.display='block';</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -2) {
        echo "<script>document.getElementById('uNameKayit').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -3) {
        echo "<script>document.getElementById('uPassKayit').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -4) {
        echo "<script>document.getElementById('uNameReel').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -5) {
        echo "<script>document.getElementById('uSurnameReel').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -6) {
        echo "<script>document.getElementById('uTC').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -7) {
        echo "<script>document.getElementById('uTel').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }
    if ($_GET['createuser'] == -8) {
        echo "<script>document.getElementById('uEmail').classList.add('is-invalid');</script>";
        echo "<script>displayKullaniciKayit();</script>";
    }

}
?>
