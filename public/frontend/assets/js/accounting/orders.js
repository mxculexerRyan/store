$(document).ready(function(){

    $('.dltBtn').on('click', function(){
        var oldid = this.id;
        var id = oldid.substr(2)
        var direction = oldid.substr(0, 1);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete product from order!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonClass: 'me-2',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if(direction == "s"){
                    $.ajax({
                        type: 'GET',
                        url: '/salesDelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
                }else{
                    $.ajax({
                        type: 'GET',
                        url: '/purchasesDelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
        
                }
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',
                window.location.reload(),
            )
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Product not deleted :)',
                'error'
            )
            }
        })
    })

});