<?php error_reporting(0); ?>
    <?php
include('Function/project_function.php');
if (!empty($_POST['addrFrom']) && !empty($_POST['addrTo'])) { 
 $addressFrom = htmlspecialchars($_POST['addrFrom']);
$addressTo = htmlspecialchars($_POST['addrTo']);
$distan = getDistance($addressFrom, $addressTo, "K");
$distance=floor($distan);
$success = true;
    }


//Book
if(isset($_POST['book'])){
    $date= date("Y-m-d");
    date_default_timezone_set("Africa/Lagos");
    $time= date("h:i:sa");
    $addressFrom =($_POST['addrFrom']);
    $addressTo =($_POST['addrTo']);
    $currency=" naira";
    $pric= $distance*130;
    $price = $pric.$currency;  
    $status="PENDING";
    if ($addressFrom !=""){
        if($addressTo !=""){
            $book= booklog($date,$time,$addressFrom,$addressTo,$price,$status);
        }else echo "no drop location";
    }else echo "no pickup location";
}



?>

        <!Doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
            <link rel="stylesheet" type="text/css" href="mystyle.css">

            <title>SUAVE-To Ride Is To Live</title>
            <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYMQ-Bu1OOtfrWsS4OZoP40kk8bkS7muQ&libraries=places&dummy=.js"></script>





            <script language="javascript">
                //calculating the price with distance
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
                    //calculating the time with distance
                    var val3 = parseInt(document.getElementById("value1").value);
                    var ansF = document.getElementById("answer2");
                    var ansE = val3 * 1.3;
                    //converting answer to hrs,mins and seconds
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
            <?php
if (isset ($_SESSION['Email'])){
	$call= session();
	if ($call [1]>0){
	while ($fetch =mysqli_fetch_object($call[0])){
	
?>
                <div class="container">
                    <div class="col-xs-12">
                        <header class="col-xl-12">
                            <h1 id="heading_1">SUAVE</h1>
                        </header>
                    </div>
                    <div class="col-xs-9">
                        <nav id="navigate">
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="HOME%20PAGE.php">HOME</a></li>
                                <li><a href="rider%20page%201.php">BOOK</a></li>
                                <li><a href>CONTACT US</a></li>
                                <li> <a href class="data-toggle" data-toggle="dropdown">PROFILE<span class="caret"></span> </a>
                                    <ul class="dropdown-menu">
                                        <li>Personal Info</li>
                                        <li>History</li>
                                        <li>Gifts</li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-xs-1">
                        <p>
                            <?php echo $fetch->Firstname;?>
                        </p>
                    </div>
                    <?php }}} ?>
                        <div class="col-xs-1">
                            <button type="button" name="register" class="btn"><a href="Logout.php">LOG OUT</a></button>
                        </div>
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
        
        if ($success == true) { echo ' ' . $distance."km"; } 
            
        ?>
         <input type="hidden" id="value1" name="value1" value="<?php echo $distance;?>"></span>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input class="btn btn-primary btn-md" type="button" name="Sumbit" value="Check Price" onclick="addNumbers(); addNumbers2();" />
                                </div>

                                <div class="form-group col-sm-12">
                                    <input type="text" size="90" width="50px" style="border:none" id="answer" name="price" value="" readonly/>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input type="text" size="42" style="border:none" id="answer2" name="value" readonly/>
                                </div>

                                <div>
                                    <input type="hidden" id="answer" name="answer" value="" />
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="submit" class="btn btn-primary btn-md" name="book" value="BOOK">
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
                        <?php 
$call=joinersession();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                            <div class="col-xs-12">
                                <div class=" jumbotron bg-primary">
                                    <center>
                                        <h2>Last Ride Status</h2>
                                        <p class="text-danger">You requested for a ride from
                                            <?php echo $fetch-> Pickup?> to
                                                <?php echo $fetch->Dropoff?> at
                                                    <?php echo $fetch->Price?>.
                                        </p>
                                        <p class="text-primary">Request status=
                                            <?php echo $fetch->Status;?>
                                        </p>
                                    </center>
                                </div>
                            </div>
                            <?php }}?>
                </div>


        </body>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>

        </html>
