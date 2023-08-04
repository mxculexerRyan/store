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
    var qty = document.getElementById("quantity"+id);
    var total = document.getElementById("total"+id);
    if(qty.value != ""){
        qty.value = "";
        total.value = 0;
    }
    getSum()

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
    var qty = element.value; 
    var row_id = (element.id).slice(8);
    var id = $('#prod'+row_id).val();
    $.ajax({
        type: 'GET',
        url: '/newprices',
        data: {qty: qty, id: id},
        success: function(data){
            $('#sprice'+row_id).val(data.msg[0].selling_price);
            var total = (($('#quantity'+row_id).val())*($('#sprice'+row_id).val()));
            $('#total'+row_id).val(total.toLocaleString());
            $('#sprice'+row_id).prop("readonly", true);
            getSum();
        }
    });

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