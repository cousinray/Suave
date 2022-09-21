<!DOCTYPE HTML>
<html>
  <head>
    <!--http://www.sitepoint.com/forums/showthread.php?1055755-Count-Down-and-Make-sound-play-on-click-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Play sound after countdown</title>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  </head>
  
  <body>
    <button id="myButton">Start Countdown</button> <br /> 
    <span id="count"></span>
    
    <script>
      function countdown(number){  
        $("#count").html(number);
        if (number === 0){
         alert('Hello') 
        } else {
          number -= 1;
          window.setTimeout(function() {
            countdown(number);
          }, 1000);
        }
        return d.promise();
      }
      
      
      var d = new $.Deferred();
      var d1 = new $.Deferred();
      
      $("#myButton").on("click", function(){
        $(this).prop("disabled", true);
        $.when(countdown(10)).then(function() { 
          playSong("audio.mp3")
          .then(function() { $("#myButton").prop("disabled", false) });
        })
      });
    </script>
  </body>
</html>