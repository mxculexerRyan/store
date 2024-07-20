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
                $('#sellprice').val(data.msg[0].selling_price - data.msg[0].item_discount);
                $('#buying_price').val(data.msg[0].buying_price);
                $('#returns_val').val(data.msg[0].selling_price - data.msg[0].item_discount);
            }
        });
    })
});

// let initialize = function(){
//     $(".prodname").select2({
//         // tags: true,
//         // templateResult: function (data){
//         //     var $result = $("<span></span>");
//         //     $result.text(data.text);
//         //     if(data.newOption){
//         //         $result.append("<em> [Create Product]</em>");
//         //     }
//         //     return $result; 
//         // },
//         // createTag: function (params){
//         //     return {
//         //         id: 'added_'+params.term,
//         //         text: params.term,
//         //         newOption: true,
                
//         //     }
//         // }
//     });
// }

// initialize(); 

function getTotal(){
    var total = (($('#returns_qty').val())*(($('#returns_val').val())));
    $('#returns_amt').val(total.toLocaleString());

}