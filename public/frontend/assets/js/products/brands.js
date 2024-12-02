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
                        url: '/brandsdelete',
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
});