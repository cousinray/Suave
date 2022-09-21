<?php
include("Function/project_function.php");

if (isset($_POST['button'])){
    $dispatch=trim($_POST['dispatch']);
    $orderid=trim($_POST['id']);
    if (ctype_digit($dispatch)){
        if (ctype_digit($orderid)){ 
            $call=dispatch($dispatch,$orderid);
}
}
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <title>CAB DISPATCH</title>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">SUAVE</a>
                        <ul class="nav navbar-nav">
                            <li><a href="admindashboard.php">DASHBOARD</a></li>
                            <li><a href="">COMPANY</a></li>
                            <li><a href="admin%20drivers.php">DRIVERS</a></li>
                            <li><a href="admin%20riders.php">RIDERS</a></li>
                            <li class="active"><a href="cab%20dispatch.php">CAB DISPATCH</a></li>
                            <li><a href="admin%20trips.php">TRIPS</a></li>
                            <li><a href="">BOOKING</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <div class="container">
            <div class="row">
                <form method="post" class="form-inline">
                    <div class="form-group col-xs-7">
                        <label for="dispatch" class="control-label">Dispatch Driver</label>
                        <input type=text name='dispatch' class="form-control">
                        <label for="id" class="control-label">Order ID</label>
                        <input type=text name='id' class="form-control">
                        <input type="submit" name='button' class="btn btn-primary" value="Dispatch">
                    </div>
                     <div class="col-xs-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Driver</th>
                            <th>Car</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
	$call=drivers();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                        <tr>
                            <td><?php echo $fetch->sn ?></td>
                            <td><?php echo $fetch->Firstname?>
                            <?php echo $fetch->Lastname?></td>
                            <td><?php echo $fetch->Vehicle ?></td> 
                            <td><?php echo $fetch->cstatus ?></td> 
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
                </form>
            </div>
            
        </div>
        <div class="container">
            <div class="row">
                <table class=" jumbotron table table-hover table justified">
                   <center><h3>PENDING ORDERS </h3></center>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Rider Name</th>
                            <th>Pickup Location</th>
                            <th>Drop Location</th>
                            <th>Status</th>
                            <th>Order ID</th>
                            <th>Driver</th>
                        </tr>
                    </thead>
                    <?php
	$call=todispatch();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php $n =$sn++; echo $n ?>
                                </td>
                                <td>
                                    <?php echo $fetch->Date?>
                                </td>
                                <td>
                                    <?php echo $fetch->Time?>
                                </td>
                                <td>
                                    <?php echo $fetch->Firstname?>
                                    <?php echo $fetch->Lastname?>
                                </td>
                                <td>
                                    <?php echo $fetch->Pickup?>
                                </td>
                                <td>
                                    <?php echo $fetch->Dropoff?>
                                </td>
                                <td>
                                    <?php
                                     echo $fetch->Status?>
                                </td>
                                <td>
                                    <?php
                                     echo $fetch->order_id?>
                                </td>
                                <td>
                                    <?php echo $fetch->Driver?>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                </table>
            </div>
        </div>
         <div class="container">
            <div class="row">
                <table class=" jumbotron table table-hover table justified">
                   <center><h3>DISPATCHED </h3></center>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Rider Name</th>
                            <th>Pickup Location</th>
                            <th>Drop Location</th>
                            <th>Status</th>
                            <th>Order ID</th>
                            <th>Driver</th>
                        </tr>
                    </thead>
                    <?php
	$call=dispatched();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php $n =$sn++; echo $n ?>
                                </td>
                                <td>
                                    <?php echo $fetch->Date?>
                                </td>
                                <td>
                                    <?php echo $fetch->Time?>
                                </td>
                                <td>
                                    <?php echo $fetch->Firstname?>
                                    <?php echo $fetch->Lastname?>
                                </td>
                                <td>
                                    <?php echo $fetch->Pickup?>
                                </td>
                                <td>
                                    <?php echo $fetch->Dropoff?>
                                </td>
                                <td>
                                    <?php
                                     echo $fetch->Status?>
                                </td>
                                <td>
                                    <?php
                                     echo $fetch->order_id?>
                                </td>
                                <td>
                                    <?php echo $fetch->Driver?>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
