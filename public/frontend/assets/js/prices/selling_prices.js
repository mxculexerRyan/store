$(document).ready(function(){
    $('.editBtn').on('click', function(){
        var id = this.id;
        $.ajax({
            type: 'GET',
            url: '/sellpricedata',
            data: 'id='+id,
            success: function(data){
                $('#editSellprice_id').val(data.msg[0].id);
                $('#editProduct_name').val(data.msg[0].product_name);
                $('#editSelling_price').val(data.msg[0].selling_price);
                $('#edit_min_qty').val(data.msg[0].min_qty);
                $('#edit_shop_price').val(data.msg[0].shop_price);
                $('#edit_shop_qty').val(data.msg[0].shop_qty);
                $('#edit_caton_price').val(data.msg[0].caton_price);
                $('#edit_caton_qty').val(data.msg[0].caton_qty);

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
                        url: '/sellpricedelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Sell Price has been deleted.',
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