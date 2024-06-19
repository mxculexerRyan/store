$(function(){
    $("#payment_method").select2({
        dropdownParent: $("#editDebtModal")
    });
});

$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/debsdata',
            data: 'id='+id,
            success: function(data){
                $('#edit_debtors_name').val(data.msg[0].name);
                $('#edit_balance_amount').val(data.msg[0].debited_amount - data.msg[0].paid_amount);
                $('#from').val(data.msg[0].debtors_name);
                $('#debtId').val(data.msg[0].id);
            }
        });
    })
});
