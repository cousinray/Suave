<?php 
include("Function/project_function.php");
if (isset($_POST['button'])){
    $engaged=($_POST['button']);
    if($engaged!=""){
    $update=cstatus($engaged);
    }
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

    </head>

    <body onload="initialize1" id="entire_body">
        <?php
if (isset ($_SESSION['Email'])){
	$call= session1();
	if ($call [1]>0){
	while ($fetch =mysqli_fetch_object($call[0])){
	
?>
        <div class="container">
            <div class="col-xs-12">
                <header class="col-xl-12">
                    <h1 id="heading_1">SUAVE</h1>
                </header>
            </div>
        </div>
        <div class="container">
            <div class="col-xs-8">
                <nav id="navigate">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="driver%20page.php">HOME</a></li>
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
            <p><?php echo $fetch->cstatus?></p>
            </div>
             <div class="col-xs-1">
                <p>
                 <?php echo $fetch->Firstname;?>
                </p>
            </div>
            <?php }}}?>
            <div class="form-group col-xs-1">
                <button type="button" name="register" class="btn"><a href="Logout.php">LOG OUT</a></button>
            </div>
        </div>

        <div class="container">
            <div class="col-xs-3">
               <form method="post">
                <div class="form-group col-xs-12">
                    <h3>Change Status</h3>
                    <button type="submit" name="button" value="AVAILABLE" class="btn btn-primary btn-lg" >AVAILABLE</button>
                </div>
                <div class="form-group col-xs-12">
                    <button type="submit" name="button" value="ENGAGED" class="btn btn-danger btn-lg">ENGAGED</button>
                </div>
                </form>
            </div>

            <div class="col-xs-8">
               <center><h4>YOU HAVE A CLIENT</h4></center>
                <table class="table table-hover table justified">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Client Name</th>
                            <th>Location</th>
                            <th>Destination</th>
                            <th>Mobile</th>
                        </tr>
                    </thead> 
                     <?php
	$call=clientinfo();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                    <tbody>
                        <tr>
                            <td><?php $n =$sn++; echo $n ?></td>
                            <td><?php echo $fetch-> Firstname ?> <?php echo $fetch-> Lastname ?></td>
                            <td><?php echo $fetch-> Pickup ?></td>
                            <td><?php echo $fetch-> Dropoff ?></td>
                            <td><?php echo $fetch-> Number ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }} ?>
            </div>
            <?php
	$call=statsession();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
            <div class="container">
            <div class=" col-xs-12">
               <h3></h3> 
            </div>
            </div>
            <?php }} ?>
        </div>
    </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </html>
