
$(document).ready(function() {

    $('.remove-image').on('click', function(event) {

        event.preventDefault();

        var triggeredElement = $(this);

        var url = triggeredElement.attr('href');

        $.ajax({
            url: url,
            method: 'get',
            success: function(data) {

                if(data.success)
                    triggeredElement.closest('.col-md-4').remove();
                else 
                    alert(data.error);
            }
        })

    })


    $('.delete-album-submit').on('click', function(event) {

        event.preventDefault();

        var triggerElement = $(this);

        $('#delete-album-modal').attr('form', triggerElement.closest('form').attr('id'));

    })

    $('#choose-another-album-modal').on('click', function(event) {

        if($('#albums-select').css('display') == 'none') {

            event.preventDefault();
            $('#albums-select').removeClass('d-none');

            $('#delete-album-modal').css('display', 'none')

            $('.modal-dialog #message').text('Will Move Pictures To Another Album And Delete It')

        }

    })

});