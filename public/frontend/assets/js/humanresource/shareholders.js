console.log("object");
$(document).ready(function(){
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
            text: "You want to delete this User",
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
                        url: '/userdelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'User has been deleted.',
                'success',
            )
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'User not deleted :)',
                'error'
            )
            }
            window.location.reload()
        })
    })
});