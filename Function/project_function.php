<?php
session_start();
//rider registration
function insert ($fname,$lname,$num,$email,$pass1,$ref){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$fname = mysqli_real_escape_string($con,$fname);
$lname = mysqli_real_escape_string($con,$lname);
$email = mysqli_real_escape_string($con,$email);
$num= mysqli_real_escape_string($con,$num);
$ref=mysqli_real_escape_string($con,$ref);
$pass1= mysqli_real_escape_string($con,$pass1);
$code=rand(10,10000000);
$encrypt=rand(10,10000000);
$encrypt1=sha1($encrypt);
$status='1';
$find=mysqli_query($con,"select Email,Number from rider_reg where Email= '$email' && Number='$num'") or die (mysqli_error());
$find1=mysqli_num_rows($find);
if($find1==0){
    
$send=mysqli_query($con,"insert into rider_reg(Firstname,Lastname,Number,Email,Password,Code,Referral,Status,Encrypt)
Values('$fname','$lname','$num','$email','$pass1','$code','$ref','$status','$encrypt1')") or die (mysqli_error());
header("location:confirmationcode.php");
$_SESSION["Email"]=$email;
}else echo "Email or Phone No already in use";
}


//driver registration
function dinsert($fname,$lname,$num,$email,$pass1,$addr,$car){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$fname = mysqli_real_escape_string($con,$fname);
$lname = mysqli_real_escape_string($con,$lname);
$email = mysqli_real_escape_string($con,$email);
$num= mysqli_real_escape_string($con,$num);
$addr=mysqli_real_escape_string($con,$addr);
$car=mysqli_real_escape_string($con,$car);
$pass1= mysqli_real_escape_string($con,$pass1);
$code=rand(10,10000000);
$encrypt=rand(10,10000000);
$encrypt1=sha1($encrypt);
$status='1';
$find=mysqli_query($con,"select Email,Number from driver_reg where Email= '$email' && Number='$num'") or die (mysqli_error());
$find1=mysqli_num_rows($find);
if($find1==0){
    
$send=mysqli_query($con,"insert into driver_reg(Firstname,Lastname,Number,Email,Password,Code,Address,Vehicle,Status,Encrypt)
Values('$fname','$lname','$num','$email','$pass1','$code','$addr','$car','$status','$encrypt1')") or die (mysqli_error());
header("location:confirmation code drivers.php");
$_SESSION["Email"]=$email;
}else echo "Email or Phone No already in use";
}


function confirm ($code) {
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$code=mysqli_real_escape_string($con,$code);
$email=$_SESSION['Email'];
$select=mysqli_query($con,"select Status,Code from rider_reg where Email='$email'") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row==1){
$fetch =mysqli_fetch_object($select);
if($fetch->Code==$code){
	$update=mysqli_query($con,"update rider_reg SET Status='2' where Email='$email'") or die (mysqli_error($con));
	header("Location:HOME PAGE.php");
}else echo "Please put correct code";
}
}

function confirm1 ($code) {
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$code=mysqli_real_escape_string($con,$code);
$email=$_SESSION['Email'];
$select=mysqli_query($con,"select Status,Code from driver_reg where Email='$email'") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row==1){
$fetch =mysqli_fetch_object($select);
if($fetch->Code==$code){
	$update=mysqli_query($con,"update driver_reg SET Status='2' where Email='$email'") or die (mysqli_error($con));
	header("Location:HOME PAGE.php");
}else echo "Please put correct code";
}
}

//rider login
function login($email,$pass){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=mysqli_real_escape_string($con,$email);
$pw=mysqli_real_escape_string($con,$pass);
$pass1=sha1($pass);
$find=mysqli_query($con,"select Email,Password,Status from rider_reg where Email= '$email'") or die (mysqli_error());
$find1=mysqli_num_rows($find); 
if ($find1==1){
	$find2=mysqli_fetch_object($find);
	
	if($find2->Password===$pass1){
				$_SESSION["Email"]=$email;
		if($find2->Status==2){
			header("location:HOME PAGE SESSION.php");
		}else header("location:confirmationcode.php");
	}else echo "incorrect login details";
}else echo "incorrect login details";
}

//driver login
function login1($email,$pass){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=mysqli_real_escape_string($con,$email);
$pw=mysqli_real_escape_string($con,$pass);
$pass1=sha1($pass);
$find=mysqli_query($con,"select Email,Password,Status from driver_reg where Email= '$email'") or die (mysqli_error());
$find1=mysqli_num_rows($find); 
if ($find1==1){
	$find2=mysqli_fetch_object($find);
	
	if($find2->Password===$pass1){
				$_SESSION["Email"]=$email;
		if($find2->Status==2){
			header("location:driver page.php");
		}else header("location:confirmation code drivers.php");
	}else echo "incorrect login details";
}else echo "incorrect login details";
}

//rider session
function session(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=$_SESSION['Email'];
$select= mysqli_query ($con, "select * from rider_reg where Email='$email'") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row==1){
	return array ($select,$row);
}else echo "no data found";
}

//driver session
function session1(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=$_SESSION['Email'];
$select= mysqli_query ($con, "select * from driver_reg where Email='$email'") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row==1){
	return array ($select,$row);
}else echo "no data found";
}



    function getDistance($address1, $address2, $unit){
        //Change address format
        $formattedAddrFrom = str_replace(' ','+',$address1);
        $formattedAddrTo = str_replace(' ','+',$address2);

        //Send request and receive json data
        $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
        $outputFrom = json_decode($geocodeFrom);
        $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
        $outputTo = json_decode($geocodeTo);

        //Get latitude and longitude from geo data
        $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo = $outputTo->results[0]->geometry->location->lng;

        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return ($miles * 1.609344).' km';
        } else if ($unit == "N") {
            return ($miles * 0.8684).' nm';
        } else {
            return $miles.' mi';
        }
    }
//riders data fetch
function riders(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$select=mysqli_query($con, "select * from rider_reg") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row>0){
	return array ($select,$row);
}else echo "no data found";
}
//driver data fetch
function drivers(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$select=mysqli_query($con, "select * from driver_reg") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row>0){
	return array ($select,$row);
}else echo "no data found";
}
//user booklog insert
function booklog($date,$time,$addressFrom,$addressTo,$price,$status){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$date=mysqli_real_escape_string($con,$date);
$time=mysqli_real_escape_string($con,$time);
$addressFrom=mysqli_real_escape_string($con, $addressFrom);
$addressTo=mysqli_real_escape_string($con, $addressTo);
$price=mysqli_real_escape_string($con, $price);
$status=mysqli_real_escape_string($con,$status);
$orderid=rand(10,10000000);
$email=$_SESSION['Email'];
$send=mysqli_query($con,"insert into book_log(Date,Time,Email,Pickup,Dropoff,Price,Status,order_id)
Values('$date','$time','$email','$addressFrom','$addressTo','$price','$status','$orderid')") or die (mysqli_error());

}

//Join booklog and rider reg and fetch to admin
function joiner(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$joiner=mysqli_query($con,"select rider_reg.sn,rider_reg.Email,rider_reg.Firstname,rider_reg.Lastname,book_log.Date, book_log.Time,book_log.Pickup,book_log.Dropoff,book_log.Price,book_log.Status,book_log.order_id,book_log.Driver from rider_reg,book_log where  rider_reg.Email=book_log.Email ORDER BY DATE DESC") or die (mysqli_error());
$joiner1=mysqli_num_rows($joiner);
if ($joiner1>0){
	return array($joiner,$joiner1);
}
}
//last booked for rider page
function joinersession(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=$_SESSION['Email'];
$date= date("Y-m-d");
$select=mysqli_query($con,"select * from book_log where Email='$email' AND Status='PENDING' AND Date='$date' order by Time DESC limit 1") or die (mysqli_error($con));
$row=mysqli_num_rows($select);
$select1=mysqli_query($con,"select * from book_log where Email='$email' AND Status='BOOKED' AND Date='$date' order by Time DESC limit 1") or die (mysqli_error($con));
$row1=mysqli_num_rows($select1);
if ($row>0){
	return array($select,$row);
}else if ($row1>0){
return array($select1,$row1);
}
}


//driver status change by driver
function cstatus($engaged){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$engaged=mysqli_real_escape_string($con,$engaged);
$email=$_SESSION['Email'];
$update=mysqli_query($con,"update driver_reg SET cstatus='$engaged' where Email='$email'") or die (mysqli_error());
}

//drivers status fetch (session) for driver to see
function statsession(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$email=$_SESSION['Email'];
$select=mysqli_query($con, "select cstatus from driver_reg where Email='$email'") or die (mysqli_error());
$row=mysqli_num_rows($select);
if ($row>0){
	return array ($select,$row);
}else echo "no data found";
}

//join rider table and book log then fetch only trip logs with pending status
function todispatch(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$datestamp = date("Y-m-d");
$joiner=mysqli_query($con,"select rider_reg.sn,rider_reg.Email,rider_reg.Firstname,rider_reg.Lastname,book_log.Date,Book_log.Time,book_log.Pickup,book_log.Dropoff,book_log.Price,book_log.Status,book_log.order_id,book_log.Driver from rider_reg,book_log where  rider_reg.Email=book_log.Email AND book_log.Status='PENDING' AND book_log.Date='$datestamp' ORDER BY Time ASC") or die (mysqli_error());
$joiner1=mysqli_num_rows($joiner);
if ($joiner1>0){
	return array($joiner,$joiner1);
}
}

//join rider table and book log then fetch Last 10 dispatch completed trips
function dispatched(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$datestamp = date("Y-m-d");
$joiner=mysqli_query($con,"select rider_reg.sn,rider_reg.Email,rider_reg.Firstname,rider_reg.Lastname,book_log.Date,Book_log.Time,book_log.Pickup,book_log.Dropoff,book_log.Price,book_log.Status,book_log.order_id,book_log.Driver from rider_reg,book_log where  rider_reg.Email=book_log.Email AND book_log.Status='BOOKED' AND book_log.Date='$datestamp' ORDER BY Time ASC limit 10") or die (mysqli_error());
$joiner1=mysqli_num_rows($joiner);
if ($joiner1>0){
	return array($joiner,$joiner1);
}
}


//dispatch driver
function dispatch($dispatch,$orderid){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD);
$dispatch=mysqli_real_escape_string($con,$dispatch);
$orderid=mysqli_real_escape_string($con,$orderid);
$select=mysqli_query($con,"select Firstname from driver_reg where sn='$dispatch'") or die (mysqli_error());
$fetch=mysqli_fetch_object($select)->Firstname;
$select1=mysqli_query($con,"select Lastname from driver_reg where sn='$dispatch'") or die (mysqli_error());
$fetch1=mysqli_fetch_object($select1)->Lastname;
$update=mysqli_query($con,"Update book_log SET Driver='$fetch.$fetch1',Status='BOOKED' where order_id='$orderid'") or die (mysqli_error());
}


//fetch client info for driver page using first and last name as reference point
function clientinfo(){
$Host="localhost";
$user="coderaymond";
$pass="show907ring956";
$dD="project";
$con=mysqli_connect($Host,$user,$pass,$dD); 
$email=$_SESSION['Email'];
$dfname=mysqli_query($con,"select Firstname from driver_reg WHERE Email='$email'") or die(mysqli_error());
$fetch=mysqli_fetch_object($dfname)->Firstname;
$dlname=mysqli_query($con,"select Lastname from driver_reg WHERE Email='$email'") or die(mysqli_error());
$fetch1=mysqli_fetch_object($dlname)->Lastname;
$select=mysqli_query($con,"select rider_reg.sn,rider_reg.Email,rider_reg.Firstname,rider_reg.Lastname,rider_reg.Number,book_log.Date,Book_log.Time,book_log.Pickup,book_log.Dropoff,book_log.Price,book_log.Driver from rider_reg,book_log where rider_reg.Email=book_log.Email AND book_log.Driver='$fetch.$fetch1' Order by book_log.Date DESC Limit 1");
$row=mysqli_num_rows($select);
if ($row>0){
	return array ($select,$row);
}else echo "no data found";
}

?>