$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/buypricedata',
            data: 'id='+id,
            success: function(data){
                $('#editBuyprice_id').val(data.msg[0].id);
                $('#editProduct_name').val(data.msg[0].product_name);
                $('#editBuying_price').val(data.msg[0].buying_price);
                $('#edit_min_qty').val(data.msg[0].min_qty);
            }
        });
    })
    $('.dltBtn').on('click', function(){
        var oldid = this.id;
        var id = oldid.substr(2)

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this Price",
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
                        url: '/buypricesdelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Buy Price has been deleted.',
                'success',
            )
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Buy Price not deleted :)',
                'error'
            )
            }
            window.location.reload()
        })
    })
});