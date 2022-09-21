<?php error_reporting(0); ?>
    <?php
include('Function/project_function.php');
if (!empty($_POST['addrFrom']) && !empty($_POST['addrTo'])) { 
 $addressFrom = htmlspecialchars($_POST['addrFrom']);
$addressTo = htmlspecialchars($_POST['addrTo']);
$distance = getDistance($addressFrom, $addressTo, "K");
$success = true;
    }

// rider login 
if (isset($_POST['button'])){
$email=trim($_POST["Email"]);
$pass=trim($_POST["Password"]);
if($email!=""){
if($pass!=""){
	$call=login($email,$pass);
}else echo "insert correct password";
}else echo "insert correct email";
}

//driver login
if (isset($_POST['button1'])){
$email=trim($_POST["Email"]);
$pass=trim($_POST["Password"]);
if($email!=""){
if($pass!=""){
	$call=login1($email,$pass);
}else echo "insert correct password";
}else echo "insert correct email";
}

?>

        <!Doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">


            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="mystyle.css">

            <title>SUAVE-To Ride Is To Live</title>
            <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYMQ-Bu1OOtfrWsS4OZoP40kk8bkS7muQ&libraries=places&dummy=.js"></script>





            <script language="javascript">
                function addNumbers() {
                    var val1 = parseInt(document.getElementById("value1").value);
                    var ansD = document.getElementById("answer");
                    val3 = document.getElementById("addrFrom");
                    val4 = document.getElementById("addrTo");
                    ansC = val1 * 130;
                    ansD.value = "The Fare Cost from " + val3.value + " to " + val4.value + " is " + ansC + " Naira";
                }

            </script>
            <script>
                function addNumbers2() {
                    var val3 = parseInt(document.getElementById("value1").value);
                    var ansF = document.getElementById("answer2");
                    var ansE = val3 * 1.3;

                    var h = Math.floor(ansE / 60);
                    var m = ansE % 60;
                    h = h < 10 ? +h : h;
                    m = m < 10 ? +m : m;
                    ansF.value = 'The approximate driving time is ' + h + "hr " + m + "m";

                }

            </script>

        </head>
        <script type="text/javascript">
            function initialize1() {
                var input = document.getElementById('addrFrom');
                var options = {
                    componentRestrictions: {
                        country: 'ng'
                    }
                };

                new google.maps.places.Autocomplete(input, options);
            }

            google.maps.event.addDomListener(window, 'load', initialize1);

        </script>

        <script type="text/javascript">
            function initialize1() {
                var input = document.getElementById('addrTo');
                var options = {
                    componentRestrictions: {
                        country: 'ng'
                    }
                };

                new google.maps.places.Autocomplete(input, options);
            }

            google.maps.event.addDomListener(window, 'load', initialize1);

        </script>

        <body onload="initialize1" id="entire_body">
            <div class="container">
                <div class="col-xs-12">
                    <header class="col-xl-12">
                        <h1 id="heading_1">SUAVE</h1>
                    </header>
                </div>
            </div>
            <div class="container">
                <div class="col-xs-6">
                    <nav id="navigate">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="HOME%20PAGE.php">HOME</a></li>
                            <li><a href>CONTACT US</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-xs-2">
                    <button type="button" name="login" class="btn btn-primary" data-toggle="modal" data-target="#login">SIGN IN</button>
                    <div class="modal fade" id="login">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>LOG IN</h3>
                                </div>
                                <div class="modal-body">
                                    <form name="form1" method="post" action="">
                                        <div class=form-group>
                                            <label for="Email">E-mail:</label>
                                            <input type=text class="form-control" name="Email" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password:</label>
                                            <input type=password class="form-control" name="Password" value="">
                                        </div>
                                        <div class=modal-footer>
                                            <input type=submit class="btn btn-default" name="button" value='Rider'>
                                            <input type=submit class="btn btn-default" name="button1" value='Driver'>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xs-2">
                    <button type="button" name="register" class="btn"><a href="Registration%20page.php">Rider Sign Up </a></button>
                </div>
                <div class="col-xs-2">
                    <button type="button" name="register" class="btn"><a href="driver%20registration.php">Driver Sign Up</a></button>
                </div>
            </div>
            <div class="container">
                <div class="col-xs-4">

                    <form method="post" class="form-horizontal">


                        <div class="form-group col-sm-12">
                            <label for="addrFrom" class="control-label">Pickup Location</label>


                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" name="addrFrom" id="addrFrom" value="<?php if(isset($_POST['submit'])) echo $addressFrom; ?>">
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="addrTo" class="control-label">Destination</label>
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" name="addrTo" id="addrTo" value="<?php if(isset($_POST['submit'])) echo $addressTo; ?>">
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <input class="btn btn-primary btn-md" type="submit" name="submit" value="Distance">
                        </div>

                        <div class="form-group col-sm-12">

                            <span>Distance: <?php 
        if(isset($_POST['submit'])){
           
        }   
        
        if ($success == true) { echo ' ' . $distance; } 
            
        ?>
         <input type="hidden" id="value1" name="value1" value="<?php echo $distance;?>"></span>
                        </div>

                        <div class="form-group col-sm-12">
                            <input class="btn btn-primary btn-md" type="button" name="Sumbit" value="Check Price" onclick="addNumbers(); addNumbers2();" />
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="text" size="90" width="50px" style="border:none" id="answer" name="value" readonly/>
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="text" size="42" style="border:none" id="answer2" name="value" readonly/>
                        </div>

                        <div>
                            <input type="hidden" id="answer" name="answer" value="" />
                        </div>
                    </form>

                </div>

                <div class="col-xs-8">
                    <div id="slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider" data-slide-to="0" class="active"></li>
                            <li data-target="#slider" data-slide-to="1"></li>
                            <li data-target="#slider" data-slide-to="2"></li>
                            <li data-target="#slider" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="carousel/LittleCab-Safaricom-Kenya-Uber-Ventures-Africa.jpg" alt="cabs">
                                <div class="carousel-caption">
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="carousel/suave%204.jpg" alt="cabs">
                                <div class="carousel-caption">
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="carousel/suave%205.jpg" alt="cabs">
                                <div class="carousel-caption">
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="carousel/suave1.jpg" alt="cabs">
                                <div class="carousel-caption">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="src-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="src-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
        </body>


        </html>
