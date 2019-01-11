function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

$('.trigger').on('click', function (e) {
    $(this).html('show')
    $('.show').slideUp('medium');
    var count = 10;
    if (readCookie("timer") != undefined) count = readCookie("timer");

    var counter = setInterval(timer, 1000);

    function timer() {
        createCookie("timer", count, 365);
        count--;
        if (count <= 0) {
            clearInterval(counter);
            $('.trigger').html('hide');
            $('.show').slideDown('medium');
            eraseCookie("timer");
            return;
        }
        console.log(count);
        console.log(readCookie("timer"));
        $('.timer').html(count);
    }
});