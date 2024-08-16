$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/productdata',
            data: 'id='+id,
            success: function(data){
                $('#prodId').val(data.msg[0].id);
                $('#editTagId').val(data.msg[0].tag_id);
                $('#editTagId').trigger('change');
                $('#editBrandId').val(data.msg[0].brand_id);
                $('#editBrandId').trigger('change');
                $('#editProduct_name').val(data.msg[0].product_name);
                $('#editProduct_key').val(data.msg[0].product_key);
                $('#editProduct_desc').val(data.msg[0].product_desc);

            }
        });
    })

});

$(function(){
    $("#tag_name").select2({
        dropdownParent: $("#addProductModal"),
        tags: true,
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em> [Create Tag]</em>");
            }
            return $result; 
        },
        createTag: function (params){
            return {
                id: 'added_'+params.term,
                text: params.term,
                newOption: true,
                
            }
        }
    });
    $("#brand_name").select2({
        dropdownParent: $("#addProductModal"),
        tags: true,
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em> [Create Tag]</em>");
            }
            return $result; 
        },
        createTag: function (params){
            return {
                id: 'added_'+params.term,
                text: params.term,
                newOption: true,
                
            }
        }
    });
    $("#editBrandId").select2({
        dropdownParent: $("#editProductModal")
    });
    $("#editTagId").select2({
        dropdownParent: $("#editProductModal")
    });
});