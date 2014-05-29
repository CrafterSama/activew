$(window).ready(function(){
    if ($('.btn-delete').length)
    {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            var form = $('#form-delete');
            var action = form.attr('action').replace('USER_ID',id);
            var row = $(this).parents('tr');
            
            row.fadeOut(1000);
            
            $.post(action, form.serialize(), function(result){
                if (result.success)
                {
                    setTimeout(function(){
                        row.delay(1000).remove();
                        alert(result.msg);
                    }, 1000);
                }
                else
                {
                    row.show();
                }
            }, 'json');
        });
    }
});
(function ($) {
    $('[data-toggle="tooltip"]').tooltip(); 
}) (jQuery);
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();            
        reader.onload = function (e) {
            $('#target').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});