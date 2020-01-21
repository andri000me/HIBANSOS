window.addEventListener('DOMContentLoaded', (event) => {
    $(".only_number").on('keypress',function (e) {
        isNaN(parseInt(e.key)) && e.preventDefault();
        if (isNaN(parseInt(e.key))){
            e.preventDefault();
        } else {
            (parseInt(`${e.target.value}${e.key}`) >101 ||
            parseInt(`${e.target.value}${e.key}`) <0 )
            && e.preventDefault();
        }
    });
});