$(function() {
    $('#myForm').validate({
        rules: {
            assigned_group: {
                required : true,
            }, 
            
        },
        messages :{
            assigned_group: {
                required : 'Please Choose a Beneficiary Group',
            }, 
            

        },
        errorElement : 'span', 
        errorPlacement: function (error,element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight : function(element, errorClass, validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight : function(element, errorClass, validClass){
            $(element).removeClass('is-invalid');
        },
    });
});

function getNames(element){
    var value = element.value;
    var assigned_list = document.getElementById('assigned_to');
    assigned_list.innerHTML = '';
    var value = element.value;
    $.ajax({
        type: 'GET',
        url: '/assiglist',
        data: 'id='+value,
        success: function(data){
            $('#assigned_to').append(data.msg);
        }
    });
}