// function newdate(){
//     var selldate = document.getElementById('selldate');
//     console.log(selldate.value);
// }
$('#addSellBtn').on('click', function (e){
    if($('#addSellBtn').hasClass('hazzy')){
        if($("#to").val() == null){
            $("#to_err").html('');
            $("#to_err").append("* Kindly enter customer's name");
            $("#to_err").removeAttr("hidden");
            if(!(document.getElementById("to").classList.contains('unstable'))){
                document.getElementById("to").classList.add('unstable');    
            }
            e.preventDefault();
        }else{
            var table = document.getElementById('salesTable');
            var qty = (table.rows.length - 2);
            for (var counter = 1; counter <= qty; counter++) {
                if($("#prod"+counter).val() == null){
                    $("#prod_err"+counter).html('');
                    $("#prod_err"+counter).append("* Kindly enter product name");
                    $("#prod_err"+counter).removeAttr("hidden");
                    if(!(document.getElementById("prod_err"+counter).classList.contains('unstable'))){
                        document.getElementById("prod_err"+counter).classList.add('unstable');
                    }
                    e.preventDefault();
                }
                if($("#quantity"+counter).val() == ""){
                    $("#qty_err"+counter).html('');
                    $("#qty_err"+counter).append("* Kindly enter product quantity");
                    $("#qty_err"+counter).removeAttr("hidden");
                    if(!(document.getElementById("qty_err"+counter).classList.contains('unstable'))){
                        document.getElementById("qty_err"+counter).classList.add('unstable');
                    }
                    e.preventDefault();
                }
                else{
                    if($("#paid_amount").val() == ""){
                        $("#paid_err").html('');
                        $("#paid_err").append("* Kindly enter paid amount");
                        $("#paid_err").removeAttr("hidden");
                        if(!(document.getElementById("paid_err").classList.contains('unstable'))){
                            document.getElementById("paid_err").classList.add('unstable');
                        }
                            e.preventDefault();
                        
                    }else{
                        console.log($("#paid_amount").val());
                        document.getElementById("addSellBtn").classList.remove('hazzy');
                    }
                }
            }
        }
    }else{
    }
})

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

function customerlist(){
    if(document.getElementById("to").classList.contains('unstable')){
        $("#to_err").css("display", "none");
    }
}

function getsprice(element){

    var id = (element.id).slice(4);
    var value = element.value;
    var qty = document.getElementById("quantity"+id);
    var total = document.getElementById("total"+id);
    var stock = document.getElementById("stock"+id);
    if(document.getElementById("prod_err"+id).classList.contains('unstable')){
        $("#prod_err"+id).css("display", "none");
    }
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
            $('#stock'+id).val(data.msg[0].product_quantity);
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
    if(document.getElementById("qty_err"+row_id).classList.contains('unstable')){
        $("#qty_err"+row_id).css("display", "none");
    }
    console.log("object");
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
        var value = table.rows[i].cells[7].firstChild.value;
        var num = value.replace(/\D/g,'');
        sumValue = sumValue + parseInt(num);
    }
    order_value.value = sumValue.toLocaleString("en-US");
}

function paidchnage(){
    console.log(":");
    if(document.getElementById("paid_err").classList.contains('unstable')){
        $("#paid_err").css("display", "none");
    }
}