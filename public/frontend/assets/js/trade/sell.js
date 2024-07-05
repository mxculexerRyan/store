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
            if($("#payment").val() == null){
                $("#payment_err").html('');
                $("#payment_err").append("* Kindly Choose Payment method");
                $("#payment_err").removeAttr("hidden");
                if(!(document.getElementById("payment").classList.contains('unstable'))){
                    document.getElementById("payment").classList.add('unstable');    
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
                    else{
                        if($("#price"+counter).val() == ""){
                            $("#price_err"+counter).html('');
                            $("#price_err"+counter).append("* Kindly enter buying price");
                            $("#price_err"+counter).removeAttr("hidden");
                            if(!(document.getElementById("price_err"+counter).classList.contains('unstable'))){
                                document.getElementById("price_err"+counter).classList.add('unstable');
                            }
                            e.preventDefault();
                        }
                        else{
                            if($("#sprice"+counter).val() == ""){
                                $("#sprice_err"+counter).html('');
                                $("#sprice_err"+counter).append("* Kindly enter selling price");
                                $("#sprice_err"+counter).removeAttr("hidden");
                                if(!(document.getElementById("sprice_err"+counter).classList.contains('unstable'))){
                                    document.getElementById("sprice_err"+counter).classList.add('unstable');
                                }
                                e.preventDefault();
                            }else{
                                if($("#quantity"+counter).val() == ""){
                                    $("#qty_err"+counter).html('');
                                    $("#qty_err"+counter).append("* Kindly enter product quantity");
                                    $("#qty_err"+counter).removeAttr("hidden");
                                    if(!(document.getElementById("qty_err"+counter).classList.contains('unstable'))){
                                        document.getElementById("qty_err"+counter).classList.add('unstable');
                                    }
                                    e.preventDefault();
                                }else{
                                    if($("#paid_amount").val() == ""){
                                        $("#paid_err").html('');
                                        $("#paid_err").append("* Kindly enter paid amount");
                                        $("#paid_err").removeAttr("hidden");
                                        if(!(document.getElementById("paid_err").classList.contains('unstable'))){
                                            document.getElementById("paid_err").classList.add('unstable');
                                        }
                                            e.preventDefault();
                                        
                                    }else{
                                        document.getElementById("addSellBtn").classList.remove('hazzy');
                                    }
                                }
                            }

                    }
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
    var stat = (element.value).slice(0, 5);
    var value = element.value;
    var qty = document.getElementById("quantity"+id);
    var total = document.getElementById("total"+id);
    var btotal = document.getElementById("btotal"+id);
    var prcheq = document.getElementById("prcheq"+id);
    var stock = document.getElementById("stock"+id);
    if(document.getElementById("prod_err"+id).classList.contains('unstable')){
        $("#prod_err"+id).css("display", "none");
    }
    if(qty.value != ""){
        qty.value = "";
        total.value = 0;
        btotal.value = 0;
        prcheq.value = 0;
    }
    if(stat == 'added'){
        $('#price'+id).prop( "readonly", false );
        $('#price'+id).val('');
        $('#price'+id).focus();
        $('#sprice'+id).prop( "readonly", false );
        $('#sprice'+id).val('');
        $('#quantity'+id).prop( "disabled", false );
        $('#quantity'+id).val('');
        $('#stock'+id).prop( "disabled", false );
        $('#stock'+id).val('');
        $('#stock'+id).prop( "disabled", true );
        $('#discount'+id).prop( "disabled", false );
        $('#discount'+id).val('');
    }else{
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
getSum()
}

function paylist(){
    if(document.getElementById("payment").classList.contains('unstable')){
        $("#payment_err").css("display", "none");
    }
}
function changePrice(element){
    var id = (element.id).slice(5);
    if(document.getElementById("price_err"+id).classList.contains('unstable')){
        $("#price_err"+id).css("display", "none");
    }
    if($("#price"+id).val() != "" && $("#sprice"+id).val() != "" && $("#quantity"+id).val() != ""){
        var element = document.getElementById("quantity"+id);
        getTotal(element);
    }
}

function changeSprice(element){
    var id = (element.id).slice(6);
    if(document.getElementById("sprice_err"+id).classList.contains('unstable')){
        $("#sprice_err"+id).css("display", "none");
    }
    if($("#price"+id).val() != "" && $("#sprice"+id).val() != "" && $("#quantity"+id).val() != ""){
        var element = document.getElementById("quantity"+id);
        getTotal(element);
    }
}

function getprices(value, id){
    $.ajax({
        type: 'GET',
        url: '/prodprices',
        data: 'id='+value,
        success: function(data){
            if(data.msg[0] == undefined){
                $('#price'+id).val(data.msg.buying_price);
                $('#stock'+id).val(data.msg.product_quantity);
                $('#prchse'+id).val(data.msg.id);
                // console.log(data.msg.id);
            }else{
                $('#price'+id).val(data.msg[0].buying_price);
                $('#stock'+id).val(data.msg[0].product_quantity);
                $('#prchse'+id).val(0);
            }
            // $('#price'+id).prop("readonly", true);
            // $('#product_supplier_'+id).val(data.msg[0].supplier_id);
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
    // $.ajax({
    //     type: 'GET',
    //     url: '/newprices',
    //     data: {qty: qty, id: id},
    //     success: function(data){
    //         // console.log(row_id);
            
    //     }
    // });

    var total = (($('#quantity'+row_id).val())*(($('#sprice'+row_id).val()) - ($('#discount'+row_id).val())));
    var btotal = (($('#quantity'+row_id).val())*($('#discount'+row_id).val()));
    var prcheq = (($('#quantity'+row_id).val())*($('#price'+row_id).val()));

    $('#total'+row_id).val(total.toLocaleString());
    $('#btotal'+row_id).val(btotal.toLocaleString());
    $('#prcheq'+row_id).val(prcheq.toLocaleString());
    getSum();

    var total = (($('#quantity'+id).val())*(($('#sprice'+id).val()) - ($('#discount'+id).val())));
    var btotal = (($('#quantity'+row_id).val())*($('#discount'+row_id).val()));
    var prcheq = (($('#quantity'+row_id).val())*($('#price'+row_id).val()));
    $('#total'+id).val(total.toLocaleString());
    $('#btotal'+id).val(btotal.toLocaleString());
    $('#prcheq'+row_id).val(prcheq.toLocaleString());
    getSum();
}

function discountTotal(element){
    var id = (element.id).slice(8);
    if($("#price"+id).val() != "" && $("#sprice"+id).val() != "" && $("#quantity"+id).val() != ""){
        var element = document.getElementById("quantity"+id);
        getTotal(element);
    }
}

function getSum(){
    var table = document.getElementById('salesTable');
    var order_value = document.getElementById('order_value');
    var purchase_eq = document.getElementById('purchase_eq');
    var order_discount = document.getElementById('order_discount');
    var sumValue = 0
    var buysumValue = 0
    var purchsumValue = 0
    var items_quantity = document.getElementById('items_quantity')
    items_quantity.value = (table.rows.length - 2);

    for(var i = 1; i < (table.rows.length - 1); i++)
    {
        var value = table.rows[i].cells[7].firstChild.value;
        var num = value.replace(/,/g,'');
        sumValue = sumValue + parseInt(num);

        var buyvalue = table.rows[i].cells[8].firstChild.value;
        var buynum = buyvalue.replace(/,/g,'');
        buysumValue = buysumValue + parseInt(buynum);

        var purchvalue = table.rows[i].cells[10].firstChild.value;
        var purchnum = purchvalue.replace(/,/g,'');
        purchsumValue = purchsumValue + parseInt(purchnum);
    }
    order_value.value = sumValue.toLocaleString("en-US");
    order_discount.value = buysumValue.toLocaleString("en-US");
    purchase_eq.value = purchsumValue.toLocaleString("en-US");
}

function paidchnage(){
    // console.log(":");
    if(document.getElementById("paid_err").classList.contains('unstable')){
        $("#paid_err").css("display", "none");
    }
}

function opend(value){
    // console.log(value.value);
}

var due_date = document.getElementById('due_date');

let initialize = function(){
    $(".prodname").select2({
        tags: true,
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em> [Create Product]</em>");
            }
            return $result; 
        },
        createTag: function (params){
            return {
                id: 'added_'+params.term,
                text: params.term,
                newOption: true,
                
            }
        }
    });
}

initialize();

$(function(){
    $("#to").select2({
        tags: true,
        createTag: function (params){
            return {
                id: params.term,
                text: params.term,
                newOption: true
            }
        },
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em>(new)</em>");
            }
            return $result; 
        }
    });
});