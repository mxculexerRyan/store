$(document).ready(function(){
    $('.rtnBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/salesdata',
            data: 'id='+id,
            success: function(data){
                $('#returnsItem_name').val(data.msg[0].product_name);
                $('#returnsPurch_qty').val(data.msg[0].sold_quantity);
                $('#retunItem_id').val(data.msg[0].id);
                $('#selling_price').val(data.msg[0].selling_price);
                $('#buying_price').val(data.msg[0].buying_price);
                $('#prod_value').val(data.msg[0].selling_price * data.msg[0].sold_quantity);
            }
        });
    })
});