window.addEventListener('DOMContentLoaded', (event) => {
    const quill = new Quill('#quill-container', {
        readOnly: true,
        "modules": {
            "toolbar": false
        },
        theme: 'snow'  // or 'bubble'
    });
    const delta = JSON.parse(window.delta);
    quill.setContents(delta);
});