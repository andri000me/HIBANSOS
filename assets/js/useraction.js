window.addEventListener('DOMContentLoaded', (event) => {
    $("#proposal").on('change', function () {
        const  btn = $("#form-btn");
        btn.removeAttr('disabled');
        btn.parent().attr('title','Upload');
    });
});