function displayKullaniciGiris() {
    document.getElementById('kullaniciGiris').style.display = "block";
    document.getElementById('kullaniciKayit').style.display = "none";
    document.getElementById('yetkiliGiris').style.display = "none";
    document.getElementById('yetkiliKayit').style.display = "none";
}

function displayKullaniciKayit() {
    document.getElementById('kullaniciGiris').style.display = "none";
    document.getElementById('kullaniciKayit').style.display = "block";
    document.getElementById('yetkiliGiris').style.display = "none";
    document.getElementById('yetkiliKayit').style.display = "none";
}

function displayYetkiliGiris() {
    document.getElementById('kullaniciGiris').style.display = "none";
    document.getElementById('kullaniciKayit').style.display = "none";
    document.getElementById('yetkiliGiris').style.display = "block";
    document.getElementById('yetkiliKayit').style.display = "none";
}

function displayYetkiliKayit() {
    document.getElementById('kullaniciGiris').style.display = "none";
    document.getElementById('kullaniciKayit').style.display = "none";
    document.getElementById('yetkiliGiris').style.display = "none";
    document.getElementById('yetkiliKayit').style.display = "block";


}

function phoneFormat(input) {
    input = input.replace(/\D/g, '');
    var size = input.length;
    if (size > 0) {
        input = "(" + input
    }
    if (size > 3) {
        input = input.slice(0, 4) + ") " + input.slice(4, 11)
    }
    if (size > 6) {
        input = input.slice(0, 9) + "-" + input.slice(9)
    }
    return input;
}

function tcFormat(input) {

    input = input.replace(/\D/g, '');
    return input;
}

function secFormat(input) {
    input = input.replace(/\D/g, '');
    if (input > 3) {
        return 3;
    }
    if (input.length > 1) {
        return 0;
    }
    return input;
}

function sifreCheck(input) {
    let pass = document.getElementById('uPassKayit').value;
    if(input===""){
        document.getElementById('uPassKayitCheck').required=false;
        document.getElementById('uPassKayitCheck').classList.remove('is-valid');
        document.getElementById('uPassKayitCheck').classList.remove('is-invalid');
    }else if (pass.localeCompare(input) === 0) {
        document.getElementById('uPassKayitCheck').required = true;
        document.getElementById('uPassKayitCheck').classList.add('is-valid');
        document.getElementById('uPassKayitCheck').classList.remove('is-invalid');
    } else {
        document.getElementById('uPassKayitCheck').required=false;
        document.getElementById('uPassKayitCheck').classList.add('is-invalid');
        document.getElementById('uPassKayitCheck').classList.remove('is-valid');
    }


}

function sifreCheck2(input) {
    let pass = document.getElementById('yPassKayit').value;
    if(input===""){
        document.getElementById('yPassKayitCheck').required=false;
        document.getElementById('yPassKayitCheck').classList.remove('is-valid');
        document.getElementById('yPassKayitCheck').classList.remove('is-invalid');
    }else if (pass.localeCompare(input) === 0) {
        document.getElementById('yPassKayitCheck').required = true;
        document.getElementById('yPassKayitCheck').classList.add('is-valid');
        document.getElementById('yPassKayitCheck').classList.remove('is-invalid');
    } else {
        document.getElementById('yPassKayitCheck').required=false;
        document.getElementById('yPassKayitCheck').classList.add('is-invalid');
        document.getElementById('yPassKayitCheck').classList.remove('is-valid');
    }


}


