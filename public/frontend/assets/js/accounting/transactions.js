
$(function(){
    $("#account").select2({
        dropdownParent: $("#addTransactionModal")
    });
    $("#from").select2({
        dropdownParent: $("#addTransactionModal")
    });
    $("#to").select2({
        dropdownParent: $("#addTransactionModal")
    });
    $("#direction").select2({
        dropdownParent: $("#addTransactionModal")
    });
});

function getFlow(element){
    var value = element.value;
    $.ajax({
        type: 'GET',
        url: '/userslist',
        success: function(data){
            if(value == "Cash-out"){
                $('#from').html('');
                $('#from').append('<option value"">Choose Sender</option>');
                data.msg.forEach(fromusers);    
            }else{
                $('#to').html('');
                $('#to').append('<option value"">Choose Receiver</option>');
                data.msg.forEach(tousers);
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '/shareholderslist',
        success: function(data){
            if(value == "Cash-in"){
                $('#from').html('');
                $('#from').append('<option value"">Choose Sender</option>');
                data.msg.forEach(fromholders);
            }else if(value == "Cash-out"){
                $('#to').html('');
                $('#to').append('<option value"">Choose Receiver</option>');
                data.msg.forEach(toholders);
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '/accountlist',
        success: function(data){
            if(value == "Transfered"){
                $('#from').html('');
                $('#from').append('<option value"">Choose Account</option>');
                data.msg.forEach(fromaccount);
            }
        }
    });

    function tousers(index){
        $('#to').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function toholders(index){
        $('#to').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function fromusers(index){
        $('#from').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function fromholders(index){
        $('#from').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function fromaccount(index){
        $('#from').append('<option value="'+index.id+'">'+index.id+'- '+index.account_name+' - '+index.account_type+'</option>');
    }

    
}