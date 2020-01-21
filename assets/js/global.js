window.addEventListener('DOMContentLoaded', () => {
    $(".is-invalid").on('keypress change',function (evt) {
        const field = $(evt.target);
        const label = field.siblings('label');
        field.removeClass('is-invalid');
        label.removeClass('text-danger');
        label.text(field.attr('placeholder'));
        label.addClass('animated fadeIn faster');

    });
    $("#app-container:first-child").addClass('animated fadeIn faster');
    $('.md-form .form-control:not(.is-invalid):not(.no-animate)').on('keyup change',function (evt) {
        const field = $(evt.target);
        const label = field.siblings('label');
        label.text(field.val().trim().length >0 ?
            field.attr('placeholder'):'Wajib di isi'
        );
        label.addClass('animated fadeIn faster');
    });
});