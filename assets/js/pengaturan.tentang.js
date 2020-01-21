window.addEventListener('DOMContentLoaded', (event) => {
    const quill = new Quill('#quill-container', {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ],
        },
        placeholder: 'Pengaturan halaman tentang pada website',
        theme: 'snow'  // or 'bubble'
    });
    const savebtn = $("#save");
    quill.on('text-change', function(evt) {
        savebtn.removeAttr('disabled');
    });
    $("form").on('submit',function () {
        $("#tentang").val(JSON.stringify(quill.getContents()));
    });
    const delta = JSON.parse(window.delta);
    quill.setContents(delta);

});