function getNames(element){
    var value = element.value;
    var assigned_list = document.getElementById('assigned_to');
    assigned_list.innerHTML = '';
            // $('#assigned_to').append(data.msg);


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