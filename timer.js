(function () {
  function display( notifier, str ) {
    document.getElementById(notifier).innerHTML = str;
  }

  function toMinuteAndSecond( x ) {
    return Math.floor(x/60) + ":" + (x=x%60 < 10 ? 0 : x%60);
  }

  function setTimer( remain, actions ) {
    var action;
    (function countdown() {
       display("countdown", toMinuteAndSecond(remain));
       if (action = actions[remain]) {
         action();
       }
       if (remain > 0) {
         remain -= 1;
         setTimeout(arguments.callee, 1000);
       }
    })(); // End countdown
  }

  setTimer(120, {
         5: function () { display("notifier", "5 seconds left");        },
     0: function () { display("notifier", "Time is up");       }
  });
})();