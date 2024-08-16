$(function(){
    $("#payment_method").select2({
        dropdownParent: $("#editCreditModal")
    });
});

$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/creditsdata',
            data: 'id='+id,
            success: function(data){
                $('#edit_creditors_name').val(data.msg[0].name);
                $('#edit_balance_amount').val(data.msg[0].paid_amount - data.msg[0].credited_amount);
                $('#to').val(data.msg[0].creditors_name);
                $('#creditId').val(data.msg[0].id);
            }
        });
    })
});
