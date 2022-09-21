<?php
include("Function/project_function.php");
if (isset($_POST['button'])){
$code=trim($_POST["Code"]);
if ($code!=""){
if (ctype_digit($code)){
$call=confirm1($code);
}else echo "insert digits only";
}else echo "Please insert correct code";
}
?>


<!Doctype html>
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Confirmation</title>
</head>

 
    <body>
     <form  id="form1" name="form1" method="post" action="">
         <p>
             <label>Code:</label>
             <br>
             <input type=text name="Code" value=""/>
         </p>
         <p><input type=submit name="button" value="Submit"></p>
     </form>   
    </body>
</html>