$('.btn-link-delete').click(function(e){
    e.preventDefault();
    var currentElement = $(this);
    jQuery('#modalDelete').modal('show').on('click', '.btn-confirm-delete', function() {
        jQuery('#modalDelete').modal('hide');
        window.location.href = currentElement.attr('href');
    });

});
