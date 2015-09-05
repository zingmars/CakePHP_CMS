window.onload = function () {
    var form = $(".login-form");
    form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
    });

    var message = $(".message");
    message.on('click', function (){
        message.css({
            opacity: 0,
            "-webkit-transform": "scale(1)",
            "transform": "scale(1)",
            "-webkit-transition": "2s",
            "transition": "2s"
        });
        window.setTimeout(function () {
            message.remove();
        }, 2000);
    });
};