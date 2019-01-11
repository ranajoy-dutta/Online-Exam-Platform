<script src="js/countdown.js"></script>

<div id='timer'>
            <script type="application/javascript">
            var myCountdownTest = new Countdown({
                                    time: 60, 
                                    width:200, 
                                    height:80, 
                                    rangeHi:"minute"
                                    });
           </script>

        </div>
		setTimeout(function() {
             $("form").submit();
          }, 60000);