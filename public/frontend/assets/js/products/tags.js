$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/tagdata',
            data: 'id='+id,
            success: function(data){
                $('#edit_tag_id').val(data.msg[0].id);
                $('#edit_tag_name').val(data.msg[0].tag_name);
                $('#edit_tag_key').val(data.msg[0].tag_key);
                $('#edit_tag_desc').val(data.msg[0].tag_desc);
            }
        });
    })
});