
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
            if(value == "Cash-in"){
                $('#to').html('');
                $('#to').append('<option value"">Choose Receiver</option>');
                data.msg.forEach(tousers);
            }else{
                $('#from').html('');
                $('#from').append('<option value"">Choose Sender</option>');
                data.msg.forEach(fromusers);
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
            }else{
                $('#to').html('');
                $('#to').append('<option value"">Choose Receiver</option>');
                data.msg.forEach(toholders);
            }
        }
    });

    function tousers(index){
        console.log(index.id);
        $('#to').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function toholders(index){
        console.log(index.id);
        $('#to').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function fromusers(index){
        console.log(index.id);
        $('#from').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }
    function fromholders(index){
        console.log(index.id);
        $('#from').append('<option value="'+index.id+'">'+index.id+'- '+index.name+' </option>');
    }

    
}