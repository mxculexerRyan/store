$(document).ready(function(){
    var num = 1;
    $('#addRowBtn').on('click', function(){
        num += 1;
        $.ajax({
            type: 'GET',
            url: '/prodlist',
            data: 'id='+num,
            success: function(data){
                $('tbody').append(data.msg);

            }
        });
    })
});

function getseller(element){
    var id = (element.id).slice(4);
    var value = element.value;
    $.ajax({
        type: 'GET',
        url: '/prodsupp',
        data: 'id='+value,
        success: function(data){
            $('#supplier'+id).html(data.msg);
            getprices(value, id);
        }
    });
}

function getprices(value, id){
    $.ajax({
        type: 'GET',
        url: '/prodprices',
        data: 'id='+value,
        success: function(data){
            $('#price'+id).val(data.msg[0].buying_price);
            $('#price'+id).prop("readonly", true);
            $('#product_supplier_'+id).val(data.msg[0].supplier_id);
            $('#quantity'+id).prop( "disabled", false );
            $('#quantity'+id).focus();
        }
    });
}

function getTotal(element){
    var id = (element.id).slice(8);
    var total = (($('#quantity'+id).val())*($('#price'+id).val()));
    $('#total'+id).val(total.toLocaleString());
    getSum();
}

function getSum(){
    var table = document.getElementById('purchasesTable');
    var sum = document.getElementById('sum');
    var sumValue = 0

    for(var i = 1; i < (table.rows.length - 1); i++)
    {
        var value = table.rows[i].cells[5].firstChild.value;
        var num = value.replace(/\D/g,'');
        sumValue = sumValue + parseInt(num);
    }
    sum.value = sumValue.toLocaleString("en-US");
}

