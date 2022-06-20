function guncelleModalOpen() {
    $('#modalDisGuncelle').modal('show');
}

function guncelleModalClose() {
    $('#modalDisGuncelle').modal('hide');
}

function fillNavBarUserİnfo(c_name_surname) {
    document.getElementById('customerInfoNav').innerHTML = 'Hoş Geldiniz, ' + c_name_surname + '.';
}

function odemeModalOpen() {
    $('#modalOdeme').modal('show');
}

function odemeModalClose() {
    $('#modalOdeme').modal('hide');
}
function resOdemeFormat(){
    document.getElementById('OdenecekMiktarInpt').classList.remove('is-valid');
    document.getElementById('OdenecekMiktarInpt').classList.remove('is-invalid');
    document.getElementById('modalOdemeBasariliAlert').style.display = 'none';
    document.getElementById('modalOdemeHataliAlert').style.display = 'none';
    document.getElementById('odemeyiYapModalBtn').disabled = true;
}
function odemeFormat(input) {

    input = input.replace(/\D/g, '');
    if (parseInt(input) > parseInt($('#odenebilirBorcSpan').text())) {
        document.getElementById('OdenecekMiktarInpt').classList.remove('is-valid');
        document.getElementById('OdenecekMiktarInpt').classList.add('is-invalid');
        document.getElementById('odemeyiYapModalBtn').disabled = true;
    } else if (parseInt(input) > 0) {
        document.getElementById('OdenecekMiktarInpt').classList.remove('is-invalid');
        document.getElementById('OdenecekMiktarInpt').classList.add('is-valid');
        document.getElementById('odemeyiYapModalBtn').disabled = false;

    }else{
        document.getElementById('odemeyiYapModalBtn').disabled = false;
    }
    return input;
}

$('#odemeyiYapModalBtn').on('click', function () {
    $.ajax(
        {
            url: './ajaxExamination_Kullanici_Borc_Ode.php',
            method: 'POST',
            data: {
                odenenMiktar: $('#OdenecekMiktarInpt').val(),
                totalPrice: $('#examination_price_detaylar').text(),
                examination_id: $('#examination_id_detaylar').text()
            },
            success: function (response) {
                console.log(response)
                var teehDetay = JSON.parse(response);
                if (teehDetay.odemeSucces == 1) {
                    document.getElementById('modalOdemeBasariliAlert').style.display = 'block';
                    document.getElementById('modalOdemeHataliAlert').style.display = 'none';
                } else {
                    document.getElementById('modalOdemeBasariliAlert').style.display = 'none';
                    document.getElementById('modalOdemeHataliAlert').style.display = 'block';
                }
                $('#examination_price_paided_data' + $('#examination_id_detaylar').text()).text(teehDetay.examination_price_paided);
                $('#examination_price_payable_data' + $('#examination_id_detaylar').text()).text(teehDetay.examination_price_payable);
                $('#odenebilirBorcSpan').text(teehDetay.examination_price_payable);
                $('#OdenecekMiktarInpt').val(0);
            },
            error: function (response) {
                alert('error:' + response);
            }
        }
    );
})
$('#borcOdeBtn').on('click', function () {
    odemeModalOpen();
    document.getElementById('ex_id_h2').innerHTML = 'Muayene Numarası: ' + $('#examination_id_detaylar').text();
    document.getElementById('toplamBorcSpan').innerHTML = $('#examination_price_detaylar').text();
    document.getElementById('odenebilirBorcSpan').innerHTML = $('#examination_price_payable_data' + $('#examination_id_detaylar').text()).text();
})

function fillTableMuayenelerDetaylar(examination_id, additional_actions, additional_actions_price, examination_price, examination_date) {

    var tbodyRef = document.getElementById('customerMuayenelerTableDataDetaylar').getElementsByTagName('tbody')[0];

    var row = tbodyRef.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    var text1 = document.createTextNode(examination_id);
    var text2 = document.createTextNode(additional_actions);
    var text3 = document.createTextNode(additional_actions_price);
    var text5 = document.createTextNode(examination_price);
    var text6 = document.createTextNode(examination_date);


    var buttonTemp;
    var textTemp;
    for (var i = 1; i <= 32; i++) {
        buttonTemp = document.createElement('BUTTON');
        textTemp = document.createTextNode('' + i);
        buttonTemp.appendChild(textTemp);
        let sayac = i;
        buttonTemp.id = 'tooth_' + i;
        buttonTemp.type = 'button';
        buttonTemp.onclick = function () {
            guncelleModalOpen();
            document.getElementById('modalDisGuncellemeBasariliAlert').style.display = 'none';
            document.getElementById('modalDisGuncellemeHataliAlert').style.display = 'none';
            $.ajax({
                url: './ajaxExamination_detaylar_dis_detay.php',
                method: 'POST',
                data: {
                    dis_no: sayac,
                    examination_id: examination_id
                },
                success: function (response) {
                    var teehDetay = JSON.parse(response);
                    $('#disFlagForm').text(teehDetay.tooth);
                    $('#disYapilanIslemForm').text(teehDetay.explanation);
                    $('#disUcretForm').text(teehDetay.price);
                    $('#dis_numarasi_h2').text(sayac);
                },
                error: function (response) {
                    alert('error:' + response);
                }
            });
        }
        buttonTemp.classList.add('btn', 'btn-outline-primary', 'my-1', 'mx-1');
        cell4.appendChild(buttonTemp);
    }
    cell1.id = 'examination_id_detaylar';
    cell2.id = 'additional_actions_detaylar';
    cell3.id = 'additional_actions_price_detaylar'
    cell4.id = 'islemler_id_detaylar';
    cell5.id = 'examination_price_detaylar';
    cell6.id = 'examination_date_detaylar';

    cell1.appendChild(text1);
    cell2.appendChild(text2);
    cell3.appendChild(text3);
    cell5.appendChild(text5);
    cell6.appendChild(text6);
}

function fillTableMuayeneler(examination_id, c_id, examination_summary, examination_price, examination_price_paided, examination_price_payable, examination_date, additional_actions, additional_actions_price) {
    var tbodyRef = document.getElementById('customerMuayenelerTableData').getElementsByTagName('tbody')[0];
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
    var text1 = document.createTextNode(examination_id);
    var text2 = document.createTextNode(c_id);
    var text3 = document.createTextNode(examination_summary);
    var text4 = document.createTextNode(examination_price);
    var text5 = document.createTextNode(examination_price_paided);
    var text6 = document.createTextNode(examination_price_payable);
    var text7 = document.createTextNode(examination_date);
    var text8 = document.createTextNode('Detaylar');
    // var text10 = document.createTextNode('Sil');
    var button1 = document.createElement('BUTTON');

    button1.onclick = function () {
        resOdemeFormat();
        $.ajax({
            url: './ajaxExamination_detaylar.php',
            method: 'POST',
            data: {
                examination_id: examination_id,
            },
            success: function (response) {
                var examination_UpdtedPhp = JSON.parse(response);
                $('#examination_id_detaylar').text(examination_UpdtedPhp.examination_id);
                $('#additional_actions_detaylar').text(examination_UpdtedPhp.additional_actions);
                $('#additional_actions_price_detaylar').text(examination_UpdtedPhp.additional_actions_price);
                $('#examination_price_detaylar').text(examination_UpdtedPhp.examination_price);
                $('#examination_date_detaylar').text(examination_UpdtedPhp.examination_date);
                for (var i = 1; i <= 32; i++) {
                    let sayac = i;
                    element_id = '#tooth_' + i;
                    $(element_id).on('click', function () {
                        guncelleModalOpen();
                        $.ajax({
                            url: './ajaxExamination_detaylar_dis_detay.php',
                            method: 'POST',
                            data: {
                                dis_no: sayac,
                                examination_id: $('#examination_id_detaylar').text()
                            },
                            success: function (response) {
                                var teehDetay = JSON.parse(response);
                                $('#disFlagForm').text(teehDetay.tooth);
                                $('#disYapilanIslemForm').text(teehDetay.explanation);
                                $('#disUcretForm').text(teehDetay.price);
                                $('#dis_numarasi_h2').text(sayac);
                            },
                            error: function (response) {
                                alert('error:' + response);
                            }
                        });
                    });
                }
            },
            error: function (response) {
                alert('error:' + response);
            }
        });
    }
    // var button3 = document.createElement('BUTTON');
    button1.appendChild(text8);
    // button3.appendChild(text10);
    button1.id = 'btnDetaylar_' + c_id;
    button1.type = 'button';
    // button3.type='button';
    button1.classList.add('btn', 'btn-outline-primary', 'my-2', 'mx-2');
    // button3.classList.add('btn','btn-outline-danger','my-2','mx-2');
    cell1.id = 'examination_id_data' + examination_id;
    cell2.id = 'c_id_data' + c_id;
    cell3.id = 'examination_summary_data' + c_id;
    cell4.id = 'examination_price_data' + examination_id;
    cell5.id = 'examination_price_paided_data' + examination_id;
    cell6.id = 'examination_price_payable_data' + examination_id;
    cell7.id = 'examination_date_data' + c_id;
    cell1.appendChild(text1);
    cell2.appendChild(text2);
    cell3.appendChild(text3);
    cell4.appendChild(text4);
    cell5.appendChild(text5);
    cell6.appendChild(text6);
    cell7.appendChild(text7);
    cell8.appendChild(button1);

}

$(document).ready(function () {
    dataTableUpdt = $('#customerMuayenelerTableData').DataTable({
        scrollY: '50vh',
        scrollCollapse: true,
        paging: true,
    });

});