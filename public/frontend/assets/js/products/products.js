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
    $('.dltBtn').on('click', function(){
        var oldid = this.id;
        var id = oldid.substr(2)
        console.log(id);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this Tag",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonClass: 'me-2',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: '/productsdelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Brand has been deleted.',
                'success',
            )
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Brand not deleted :)',
                'error'
            )
            }
            window.location.reload()
        })
    })

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
                $result.append("<em> [Create Brand]</em>");
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
        dropdownParent: $("#editProductModal"),
        tags: true,
        templateResult: function (data){
            var $result = $("<span></span>");
            $result.text(data.text);
            if(data.newOption){
                $result.append("<em> [Create Brand]</em>");
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
    $("#editTagId").select2({
        dropdownParent: $("#editProductModal"),
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
});