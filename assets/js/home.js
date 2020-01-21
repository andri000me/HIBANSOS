const kategori_select = $("#kategori-select");
kategori_select.on('change',function (e) {
    const link = $("#cari-kategori-link");
    link.attr('href', $(e.target).val());
});
$("#cari-kategori-link").on('click',function (e) {
    kategori_select.val() === null ? e.preventDefault() :
        function () {
            window.location = kategori_select.val();
        }();
});
const carinama=$("#cari-nama-text");
carinama.on('keyup', function (e) {
    $('#cari-nama-link').attr('href', window.carinamalink+$(e.target).val());
});