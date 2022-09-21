<?php
include("Function/project_function.php");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Driver Control</title>
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
                        <li class="active"><a href="admin%20drivers.php">DRIVERS</a></li>
                        <li><a href="admin%20riders.php">RIDERS</a></li>
                        <li><a href="cab%20dispatch.php">CAB DISPATCH</a></li>
                        <li><a href="admin%20trips.php">TRIPS</a></li>
                        <li><a href="">BOOKING</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <table class="table table-hover table justified">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Driver Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
	$call=drivers();
	if ($call[1]>0){ $sn=1;
		while($fetch=mysqli_fetch_object($call[0])){
?>
                    <tbody>
                        <tr>
                            <td>
                                <?php $n =$sn++; echo $n ?>
                            </td>
                            <td>
                                <?php echo $fetch->Firstname?> <?php echo $fetch->Lastname?>
                            </td>
                            <td>
                                <?php echo $fetch->Email?>
                            </td>
                            <td>
                                <?php echo $fetch->Number?>
                            </td>
                            <td>
                                <?php echo $fetch->Address?>
                            </td>
                            <td>
                                <?php echo $fetch->Vehicle?>
                            </td>
                            <td>
                                <?php echo $fetch->cstatus?>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>

</html>
