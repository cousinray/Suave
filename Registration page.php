<?php
include ("Function/project_function.php");
if (isset($_POST['button'])){
        $fname=trim($_POST['fullname']);
            $lname=trim($_POST['lastname']);
                $num=trim($_POST['number']);
                    $email=$_POST['email'];
                        $pass=$_POST['password'];
                        $pass1=sha1($pass);
                        $passlength=strlen($pass1);
                            $cpass=trim($_POST['cpassword']);
                                $ref=trim($_POST['referral']);
        if ($fname!=""){
            if($lname!=""){
                if(ctype_digit($num)){
                    if($email!=""){
                        if (ctype_alnum($pass)){
                            if ($cpass=$pass){
                            if ($passlength>=8){
                                if ($ref!=""){
                                 $call=insert($fname,$lname,$num,$email,$pass1,$ref);   
                                } else echo "Insert Referral";
                            } else echo "Password length must be at least 8 characters long";
                        }else echo "Password Mismatch";
                        }else echo"Wrong password combunation";
                    }else echo "Input E-mail address";
                }else echo "Input Phone Number";
            }else echo "Input Surname";
        }else echo "Input First Name";
}
?>


    <!Doctype>
    <html>
    <link rel=stylesheet type="text/css" a href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" a href="mystyle.css">
    <body>
        <title>CREATE ACCOUNT</title>
        <div class="container">
            <div class="row">
                <header class="col-xl-12">
                    <h1 id="heading_1">SUAVE</h1>
                </header>
                <div class="col-xs-10">
                    <nav id="navigate">
                        <ul class="nav nav-pills nav-justified">
                            <li ><a href="HOME%20PAGE.php">HOME</a></li>
                            <li><a href>CONTACT US</a></li>
                            <li class=> <a href class="data-toggle" data-toggle="dropdown">PROFILE<span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                    <li>Personal Info</li>
                                    <li>History</li>
                                    <li>Gifts</li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-10">
                    <div class="col-xs-6">
                        <form method="post" action="" class="form-horizontal">
                            <h1>Rider Sign-Up</h1>
                            <div class="form-group">
                                <label for="fullname">First Name:</label>
                                <input type=text class="form-control" name="fullname" value="<?php if(isset($_POST['button'])) echo $fname; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type=text class="form-control" name="lastname" value="<?php if(isset($_POST['button'])) echo $lname; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="number">Phone Number:</label>
                                <input type=text class="form-control" name="number" value="<?php if(isset($_POST['button'])) echo $num; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type=text class="form-control" name="email" value="<?php if(isset($_POST['button'])) echo $email; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" />
                            </div>
                            <div class=form-group>
                                <label for="cpassword"> Confirm Password:</label>

                                <input type="password" class="form-control" name='cpassword' />
                            </div>
                            <div class="form-group">
                                <label for="referral">Referral:</label>
                                <input type=text class="form-control" name='referral' value="<?php if(isset($_POST['button'])) echo $ref; ?>" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-defaut" name="button" value="REGISTER">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>

    </html>
