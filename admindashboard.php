<?php
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD); 
$riders = mysqli_query($con, "Select Firstname FROM rider_reg") or die (mysqli_error()); 
$riderrow= mysqli_num_rows($riders);
$drivers=mysqli_query($con,"select Firstname from driver_reg")or die (mysqli_error());
$driverrow=mysqli_num_rows($drivers);
$trips=mysqli_query($con,"select Pickup from book_log")or die (mysqli_error());
$tripsrow=mysqli_num_rows($trips);
$earnings=mysqli_query($con,"select sum(Price) as earnings from book_log")or die (mysqli_error());
$earningsrows=mysqli_fetch_object($earnings)->earnings;
$pending=mysqli_query($con,"select Status from book_log where Status='PENDING'");
$pendingrow=mysqli_num_rows($pending);
?>


    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <title>Admin Dashboard</title>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">SUAVE</a>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="admindashboard.php">DASHBOARD</a></li>
                            <li><a href="">COMPANY</a></li>
                            <li><a href="admin%20drivers.php">DRIVERS</a></li>
                            <li><a href="admin%20riders.php">RIDERS</a></li>
                            <li><a href="cab%20dispatch.php">CAB DISPATCH</a></li>
                            <li><a href="admin%20trips.php">TRIPS</a></li>
                            <li><a href="">BOOKING</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class=" jumbotron container-fluid" id="jumbotron">
                <center>
                    <h1>DASHBOARD</h1>
                    <p class="text-primary">Administrator Control Panel</p>
                </center>
            </div>
        </div>
        <div class=" container">
            <div class="col-xs-6">
               <div class="row">
                <div class="col-xs-4">
                    <div class="well" style="background-color:#ffaa00; text-color:white;">
                        <center>
                            <h1 style="color:white"><?php echo ($riderrow); ?></h1>
                            <h4 class="text-white">RIDERS</h4></center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="well" style="background-color:#428bca; text-color:white;">
                        <center>
                            <h1 style="color:white"><?php echo ($driverrow); ?></h1>
                            <h4>DRIVERS</h4></center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="well" style="background-color:#d9534f; text-color:white;">
                        <center>
                            <h1 style="color:white"><?php echo ($tripsrow); ?></h1>
                            <h4>TRIPS</h4></center>
                    </div>
                </div>
                </div>
            
            <div class="row">
                <div class="col-xs-4">
                    <div class="well" style="background-color:#d9534f; text-color:white;">
                        <center>
                            <h2 style="color:white">&#8358;<?php echo ($earningsrows); ?></h2>
                            <h4 class='text-center'>EARNINGS</h4> 
                        </center>
                        
                </div>
                </div>
                <div class="col-xs-4">
                    <div class="well" style="background-color:#428bca; text-color:white;">
                        <center>
                            <h1 style="color:white">0</h1></center>
                        <h4 class="text-center">COMPLETED</h4>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="well" style="background-color:#ffaa00; text-color:white;">
                        <center>
                            <h1 style="color:white"><?php echo ($pendingrow); ?></h1>
                            <h4>PENDING</h4></center>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xs-6">
           <div class='well' id="well">
            <h1 class="text-center">Ratings and Complaints</h1>
            
            </div>
        </div>
        </div>
    </body>

    </html>
