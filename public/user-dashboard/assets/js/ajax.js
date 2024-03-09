
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

});