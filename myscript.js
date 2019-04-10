function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        hours = parseInt(timer / 3600, 10)
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $.post('', {time: timer});
        display.textContent = hours + ":" + minutes + ":" + seconds;
        if (timer-- <= 0) {
        alert('Time Over! Your answers have been submitted!')
        window.location ='test_server.php?endtest=true';
        }
    }, 1000);
}
function ansselect(quesnum, ans, attempt, id){
    console.log(quesnum);
    $.ajax({
        type: "POST",
        url: "/Placement-Preparation-Portal/test_server.php",
        data: {quesnum, ans, attempt, id},
        success: function(data, status)
        {
            console.log(status);
        },
        error: function(data, status)
        {
            console.log(status);
        }
     });
    $( "#choices" ).load(window.location.href + " #choices" );
}
function endtest(){
    alert("test ended!!!");
    window.location ='test_server.php?endtest=true';
}