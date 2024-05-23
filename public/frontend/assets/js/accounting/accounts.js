$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        console.log(id);
        $.ajax({
            type: 'GET',
            url: '/accountdata',
            data: 'id='+id,
            success: function(data){
                $('#editAccount_type').val(data.msg[0].account_type);
                $('#editAccount_name').val(data.msg[0].account_name);
                $('#editAccount_number').val(data.msg[0].account_number);
                $('#editAccount_balance').val(data.msg[0].account_balance);

            }
        });
    })
});