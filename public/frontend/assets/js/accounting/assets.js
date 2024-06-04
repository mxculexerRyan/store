$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/assetdata',
            data: 'id='+id,
            success: function(data){
                $('#editAssets_name').val(data.msg[0].asset_name);
                $('#editAsset_amount').val(data.msg[0].asset_amount);
                $('#editAsset_value').val(data.msg[0].asset_value);
                $('#editAsset_type').val(data.msg[0].asset_type);

            }
        });
    })
});

$(function(){
    $("#asset_type").select2({
        dropdownParent: $("#addAssetsModal")
    });
});