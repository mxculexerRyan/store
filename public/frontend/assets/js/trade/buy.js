$(document).ready(function(){
    var num = 1;
    $('#addRowBtn').on('click', function(){
        num += 1;
        $.ajax({
            type: 'GET',
            url: '/buytemp',
            data: 'id='+num,
            success: function(data){
                $('tbody').append(data.msg);

            }
        });
    })
});

function getbprice(element){
    console.log(element.value);
    var id = (element.id).slice(4);
    var stat = (element.value).slice(0, 5);
    var value = element.value;
    var qty = document.getElementById("quantity"+id);
    var stock = document.getElementById("stock"+id);
    var total = document.getElementById("total"+id);
    var btotal = document.getElementById("btotal"+id);
    if(document.getElementById("prod_err"+id).classList.contains('unstable')){
        $("#prod_err"+id).css("display", "none");
    }
    
    if(qty.value != ""){
        qty.value = "";
        total.value = 0;
        btotal.value = 0;
    }

    if(stat == 'added'){
        $('#price'+id).prop( "readonly", false );
        $('#price'+id).val('');
        $('#price'+id).focus();
        $('#sprice'+id).prop( "readonly", false );
        $('#sprice'+id).val('');
        $('#quantity'+id).prop( "disabled", false );
        $('#quantity'+id).val('');
        $('#markup'+id).prop( "disabled", false );
        $('#markup'+id).val('');
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
    
        function getprices(value, id){
            $.ajax({
                type: 'GET',
                url: '/buyprices',
                data: 'id='+value,
                success: function(data){
                    $('#price'+id).val(data.msg[0].buying_price);
                    $('#stock'+id).val(data.msg[0].product_quantity);
                    // $('#price'+id).prop("readonly", true);
                    // $('#sprice'+id).prop("readonly", true);
                    $('#quantity'+id).prop( "disabled", false );
                    $('#markup'+id).prop( "disabled", false );
                    $('#quantity'+id).focus();
                }
            });
        }
    
        getSum()
    }
}

function getSum(){
    var table = document.getElementById('purchaseTable');
    var order_value = document.getElementById('order_value');
    var order_markup = document.getElementById('order_markup');
    var sumValue = 0
    var buysumValue = 0
    var items_quantity = document.getElementById('items_quantity');
    items_quantity.value = (table.rows.length - 2);

    for(var i = 1; i < (table.rows.length - 1); i++)
    {
        var value = table.rows[i].cells[7].firstChild.value;
        var num = value.replace(/,/g,'');
        sumValue = sumValue + parseInt(num);

        var buyvalue = table.rows[i].cells[8].firstChild.value;
        var buynum = buyvalue.replace(/,/g,'');
        buysumValue = buysumValue + parseInt(buynum);
    }
    order_value.value = sumValue.toLocaleString("en-US");
    order_markup.value = buysumValue.toLocaleString("en-US");
}

function getTotal(element){
    var row_id = (element.id).slice(8);
    var id = $('#prod'+row_id).val();
    if(document.getElementById("qty_err"+row_id).classList.contains('unstable')){
        $("#qty_err"+row_id).css("display", "none");
    }
    $.ajax({
        type: 'GET',
        url: '/neatprices',
        data: 'id='+id,
        success: function(data){

            // $('#price'+row_id).val(data.msg[0].buying_price);
            var markup = Number($('#markup'+row_id).val())
            var price = Number($('#price'+row_id).val())
            var quantity = Number($('#quantity'+row_id).val())
            var total = (($('#quantity'+row_id).val())*(markup + price));
            var btotal = ((quantity)*(markup));
            $('#total'+row_id).val(total.toLocaleString());
            $('#btotal'+row_id).val(btotal.toLocaleString());
            // $('#price'+row_id).prop("readonly", true);
            getSum();
        }
    });

    var total = (($('#quantity'+id).val())*($('#price'+id).val()));
    $('#total'+id).val(total.toLocaleString());
    getSum();
}

function markupTotal(element){
    var id = (element.id).slice(6);
    if($("#price"+id).val() != "" && $("#sprice"+id).val() != "" && $("#quantity"+id).val() != ""){
        var element = document.getElementById("quantity"+id);
        getTotal(element);
    }
}

$('#addPurchaseBtn').on('click', function (e){
    if($('#addPurchaseBtn').hasClass('hazzy')){
        if($("#to").val() == null){
            $("#to_err").html('');
            $("#to_err").append("* Kindly enter supplier's name");
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
                var table = document.getElementById('purchaseTable');
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
                    }else{
                        if($("#price"+counter).val() == ""){
                            $("#price_err"+counter).html('');
                            $("#price_err"+counter).append("* Kindly enter buying price");
                            $("#price_err"+counter).removeAttr("hidden");
                            if(!(document.getElementById("price_err"+counter).classList.contains('unstable'))){
                                document.getElementById("price_err"+counter).classList.add('unstable');
                            }
                            e.preventDefault();
                        }else{
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
                                        document.getElementById("addPurchaseBtn").classList.remove('hazzy');
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

function supplierslist(){
    if(document.getElementById("to").classList.contains('unstable')){
        $("#to_err").css("display", "none");
    }
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
function paidchange(){
    if(document.getElementById("paid_err").classList.contains('unstable')){
        $("#paid_err").css("display", "none");
    }
}

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
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em> [Add Supplier]</em>");
            }
            return $result; 
        },
        createTag: function (params){
            return {
                id: params.term,
                text: params.term,
                newOption: true
            }
        }
    });
});