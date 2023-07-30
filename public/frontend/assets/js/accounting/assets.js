$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/assetdata',
            data: 'id='+id,
            success: function(data){
                $('tbody').append(data.msg);

            }
        });
    })
});