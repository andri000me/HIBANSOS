window.addEventListener('DOMContentLoaded', (event) => {
    // const form = $('form');
    // form.parsley();
    // Array.from(form[0].elements).forEach(function (element) {
    //     $(element).on('keyup',function (item) {
    //         const pars = $(item.target).parsley();
    //         const checkvalid = pars.isValid();
    //         checkvalid ? showSuccess($(item)):showFielderror($(item));
    //     });
    // });
    // $('.is-invalid').on('keyup',function (evt) {
    //     const item = evt.target;
    //     const pars = $(item).parsley();
    //     const checkvalid = pars.isValid();
    //     checkvalid ? showSuccess($(item)):showFielderror($(item));
    // });
});

function showFielderror(jqo) {
    const label = jqo.siblings('label');
    label.addClass('text-danger');
    label.removeClass('text-muted');
    jqo.addClass('is-invalid');
    jqo.removeClass('is-valid');
}
function showSuccess(jqo) {
    const label = jqo.siblings('label');
    label.removeClass('text-danger');
    label.addClass('text-muted');
    jqo.addClass('is-valid');
    jqo.removeClass('is-invalid');
}