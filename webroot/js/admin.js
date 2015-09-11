function pushMessage(t, title, message){
    $.Notify({
        caption: title,
        content: message,
        type: t
    });
}
function openDialogue(id, callback) {
    var dialog = $("#"+id).data('dialog');
    dialog.open();

    $("#cell-content").on('click', function(event) {
        dialog.close();
        $("#cell-content").unbind();
        if(typeof(callback) == typeof(Function)) callback();
    });
}

$(function(){
    $('.sidebar').on('click', 'li', function(){
        if (!$(this).hasClass('active')) {
            $('.sidebar li').removeClass('active');
            $(this).addClass('active');
        }
    });

    //TODO: /Posts specific functions. Should move them to their own file.
    $(".showaction").on('click', function (e) {
        e.stopPropagation();
        openDialogue('action_dialogue');
    });
    $(".checkbox input").on('click', function () {
       if($(".checkbox input").is(':checked')) {
           $('.showmultipleaction').removeClass('disabled').addClass('primary');
        }
        else {
           $('.showmultipleaction').addClass('disabled').removeClass('primary');
       }
    });

    $('.showmultipleaction').on('click', function (e) {
        if ($(".showmultipleaction").hasClass('disabled')) {
            pushMessage('warning', 'Info', 'Please select an item');
        }
        else {
            e.stopPropagation();
            $(".editpost").addClass('disabled').removeClass('primary');
            openDialogue('action_dialogue', function () {
                $(".editpost").addClass('primary').removeClass('disabled');
            });
        }
    });
})

