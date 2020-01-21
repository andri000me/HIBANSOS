window.addEventListener('DOMContentLoaded', (event) => {
    $("#lanjut-asisten").on('click',function (e) {
        $("[type='radio']:checked").prop('checked',false);
        $(e.target).attr('name', 'kategoriPemeriksaanTUSETDA');
        $(e.target).attr('value', -1);
    });
});