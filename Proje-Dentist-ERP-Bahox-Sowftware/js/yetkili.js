var dataTableUpdt;
$(document).ready(function () {
    dataTableUpdt=$('#yetkiliAllkullaniciTable').DataTable({
        scrollY: '70vh',
        scrollCollapse: true,
        paging: true,
    });
});
// $('#yetkiliAllkullaniciTable').scrollTableBody();
function getByIdUpdtCustomer(value){
    dataTableUpdt.columns(0).search('\\b'+value+'\\b', true, false).remove().draw();
}
setTimeout(function () {
    $('#modalDeleteUser').modal('hide')
}, 1000);

function guncelleModalOpen() {
    $('#modalUpdateUser').modal('show');
}

function guncelleModalClose() {
    $('#modalUpdateUser').modal('hide');
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

function reValidUpdateElement() {
    document.getElementById('uNameReelUpdate').classList.remove('is-invalid')
    document.getElementById('uSurnameReelUpdate').classList.remove('is-invalid');
    document.getElementById('uTCUpdate').classList.remove('is-invalid');
    document.getElementById('uTelUpdate').classList.remove('is-invalid');
    document.getElementById('uEmailUpdate').classList.remove('is-invalid');
    document.getElementById('kullaniciUpdateBasarili').style.display = 'none';
    document.getElementById('kullaniciUpdateHata').style.display = 'none';
}

function getCookie(cookieName) {
    let cookie = {};
    document.cookie.split(';').forEach(function (el) {
        let [key, value] = el.split('=');
        cookie[key.trim()] = value;
    })
    return cookie[cookieName];

}
function  restoreDataTableUpdate(c_id_temp){
    //cell1='#c_id'+c_id_temp;
    cell1='#c_name'+c_id_temp;
    cell2='#c_surname'+c_id_temp;
    cell3='#c_tcno'+c_id_temp;
    cell4='#c_tel'+c_id_temp;
    cell5='#c_email'+c_id_temp;
    $(cell1).text($('#uNameReelUpdate').val());
    $(cell2).text($('#uSurnameReelUpdate').val());
    $(cell3).text($('#uTCUpdate').val());
    $(cell4).text($('#uTelUpdate').val());
    $(cell5).text($('#uEmailUpdate').val());
}


// var myModal = $('#modalDeleteUser').on('shown', function () {
//     clearTimeout(myModal.data('hideInteval'))
//     var id = setTimeout(function () {
//         myModal.modal('hide');
//     });
//     myModal.data('hideInteval', id);
// });