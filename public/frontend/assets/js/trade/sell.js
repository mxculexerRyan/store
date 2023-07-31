// function newdate(){
//     var selldate = document.getElementById('selldate');
//     console.log(selldate.value);
// }

$(document).ready(function(){
    var num = 1;
    $('#addRowBtn').on('click', function(){
        num += 1;
        $.ajax({
            type: 'GET',
            url: '/saletemp',
            data: 'id='+num,
            success: function(data){
                $('tbody').append(data.msg);

            }
        });
    })
});

function getsprice(element){
    var id = (element.id).slice(4);
    var value = element.value;
    $.ajax({
        type: 'GET',
        url: '/saleprices',
        data: 'id='+value,
        success: function(data){
            $('#sprice'+id).val(data.msg[0].selling_price);
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
    var total = (($('#quantity'+id).val())*($('#sprice'+id).val()));
    $('#total'+id).val(total.toLocaleString());
    getSum();
}

function getSum(){
    var table = document.getElementById('salesTable');
    var order_value = document.getElementById('order_value');
    var sumValue = 0
    var items_quantity = document.getElementById('items_quantity')
    items_quantity.value = (table.rows.length - 2);

    for(var i = 1; i < (table.rows.length - 1); i++)
    {
        var value = table.rows[i].cells[5].firstChild.value;
        var num = value.replace(/\D/g,'');
        sumValue = sumValue + parseInt(num);
    }
    order_value.value = sumValue.toLocaleString("en-US");
}