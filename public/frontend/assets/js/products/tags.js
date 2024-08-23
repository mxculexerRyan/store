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
                        url: '/tagsdelete',
                        data: 'id='+id,
                        success: function(data){
                            console.log(data);
                        }
                    });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Tag has been deleted.',
                'success',
            )
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Tag not deleted :)',
                'error'
            )
            }
            window.location.reload()
        })
    })
});