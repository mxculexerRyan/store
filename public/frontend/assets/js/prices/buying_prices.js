$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/buypricedata',
            data: 'id='+id,
            success: function(data){
                $('#editBuyprice_id').val(data.msg[0].id);
                $('#editProduct_name').val(data.msg[0].product_name);
                $('#editBuying_price').val(data.msg[0].buying_price);
                $('#edit_min_qty').val(data.msg[0].min_qty);
            }
        });
    })
});