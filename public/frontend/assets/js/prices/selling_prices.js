$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/sellpricedata',
            data: 'id='+id,
            success: function(data){
                $('#editSellprice_id').val(data.msg[0].id);
                $('#editProduct_name').val(data.msg[0].product_name);
                $('#editSelling_price').val(data.msg[0].selling_price);
                $('#edit_min_qty').val(data.msg[0].min_qty);
                $('#edit_shop_price').val(data.msg[0].shop_price);
                $('#edit_shop_qty').val(data.msg[0].shop_qty);
                $('#edit_caton_price').val(data.msg[0].caton_price);
                $('#edit_caton_qty').val(data.msg[0].caton_qty);

            }
        });
    })
});