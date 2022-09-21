<?php
include('Function/project_function.php');

if (isset($_POST['button']));{
if (!empty($_POST['addr1']) && !empty($_POST['addr2'])) { 
if ($pick !=""){
 if   ($drop !="") {
     
        
 }}}}
?>
    <!Doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <title>RIDE WITH SUAVE </title>
        <script language="JavaScript" type="text/javascript">
            <!--
            var timer;
            var count = 10;

            function countDown() {
                var val = document.forms[0].countD;
                val.value = count;
                if (count <= 0) {
                    count = 11;
                    alert('SUAVE HAS REACHED YOUR LOCATION')
                    clearTimeout(timer);
                } else {
                    timer = setTimeout('countDown()', 1000);
                }
                count--;
            }
            //-->

        </script>
    </head>

    <body onload="initialize1" id="entire_body">
                          <?php
if (isset ($_SESSION['Email'])){
	$call= session();
	if ($call [1]>0){
	while ($fetch =mysqli_fetch_object($call[0])){
	
?>
                                
        <div class="container">
            <div class="col-xs-12">
                <header>
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
            <div class="col-xs-3">
             Welcome <?php echo $fetch->Firstname;?> <?php echo $fetch->Lastname; ?>
                <?php }}} ?>
            </div>
            <div class="col-xs-4">
                <form method="post" action="" class="form-horizontal">
                    <div class="form-group">
                        <label for="addr1">Pick Up:</label>
                        <input type=text class="form-control" name="addr1">
                    </div>
                    <div class="form-group">
                        <label>Drop Off:</label>
                        <input type=text class="form-control" name="addr2" value=> </div>
                    <div class="form-group">
                        <input type="button" value="SUAVE" onClick="countDown()" value="click">
                    </div>
                    <div>
                        <input type="text" class="form-control" name="countD" readonly>
                    </div>


                </form>
            </div>
        </div>
    </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </html>
