$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/branddata',
            data: 'id='+id,
            success: function(data){
                $('#edit_brand_id').val(data.msg[0].id);
                $('#edit_brand_name').val(data.msg[0].brand_name);
                $('#edit_brand_key').val(data.msg[0].brand_key);
                $('#edit_brand_desc').val(data.msg[0].brand_desc);
            }
        });
    })
});