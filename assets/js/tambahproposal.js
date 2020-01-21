const flatpick =  $('#datepicker').flatpickr({
    'locale':'id',
    onChange:function (e) {
        console.log(e);
    }
});

const files = $('input[type=file]');

files.each(function () {
    $(this).on('change',function () {
       if ((files[0].value!=='' && files[1].value!=="")){
           $('#form-btn').removeAttr('disabled');
       }
    });
   console.log(files[0],files[1]);
});