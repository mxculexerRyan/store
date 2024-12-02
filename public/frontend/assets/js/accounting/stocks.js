$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        console.log(id);
        $.ajax({
            type: 'GET',
            url: '/stocksdata',
            data: 'id='+id,
            success: function(data){
                var qty;
                var price = data.msg[0].caton_price;
                if(data.msg[0].product_quantity < 0){
                    qty = 0;
                }else{
                    qty = data.msg[0].product_quantity
                }
                console.log(typeof price);

                $('#product_id').val(data.msg[0].product_id);
                $('#editProducts_name').val(data.msg[0].product_name);
                $('#editAvailable_qty').val((Number(qty)).toLocaleString('en-us'));
                $('#editProductsValue').val((Number(price)).toLocaleString('en-us'));
                $('#editTotalValue').val((Number(price * qty).toLocaleString('en-us')));

            }
        });
    })
});