
$(document).ready(function() {

    $('.sidebar-menu .tree').on('click', function(event) {
       
        let triggerElement = $(this);

        $('.sidebar-menu li').removeClass('active');

        triggerElement.addClass('active');

        let treeMenu = triggerElement.find('.treeview-menu');

        if(treeMenu.css('display') == 'block') {
            treeMenu.removeClass('open');
        } else {
            treeMenu.addClass('open')
        }

        treeMenu.slideToggle(300)

    })


    function readURL(input, preview) {

        var files = $(input)[0].files;
        
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            var reader = new FileReader();
            
            reader.onload = function(e) {

                var imageSrc = e.target.result;
                
                var imgElement = $('<img>').attr('src', imageSrc).addClass('col-md-4');
                
                $('.' + preview).append(imgElement);

            }
          
            reader.readAsDataURL(file);
        }

    }

    $('#pictures').change(function() {
        readURL(this, 'image-preview')
    })

});