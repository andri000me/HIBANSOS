const modal = $("#modal");
const form = modal.find('form');
window.addEventListener('DOMContentLoaded', (event) => {
    const btnactions = $(".btn-action");
    btnactions.on('click', actionHandler);
    const table = $("table").dataTable();
});
function triggerModal() {
    modal.modal('show');
}
function actionHandler() {
    const clone = $(this).clone();
    clone.attr('disabled', 'disabled');
    clone.addClass('w-50 mx-0');
    clone.removeClass('btn-block mr-1 waves-effect waves-light');
    $("#btn-container").empty().append(clone);
    prepareform(clone,{
        link:clone.attr('data-action'),
        _userid:clone.attr('data-userid'),
        _username:clone.attr('data-username')
    });
    triggerModal();
}
function prepareform(clone, {link, _userid, _username}) {
    const username = form.find('#username');
    const userid = form.find('#userid');
    username.text(_username);
    userid.val(_userid);
    form.attr('action',link);
    clone.on('click',
        function () {
            form.submit();
        });
    $('#konfirmasi').on('keyup',function () {
       this.value === _username ?
           clone.removeAttr('disabled') :
           clone.attr('disabled','disabled')
    });
    modal.on('hidden.bs.modal',function () {
       $("#konfirmasi").unbind('keyup');
    });
}