<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            header("Location:../index.html");
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
    <head>
        <title>Farmi/LOGIN Page</title>
        <link href="style.css" rel="stylesheet" type="text/css">
		 
    </head>
      <style>
      a {
      text-decoration: none;
      }
      a:link {
      color: #000;
      border-bottom: 1px solid #ff0000;
      }
      a:visited {
      color: #e600e6;
      border-bottom: 1px solid #b3b3b3;
      }
      a:hover {
      color: #2d8653;
      border-bottom: 1px solid #000099;
      }
    </style>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="radio" name="box" value = "farmer" required />Farmer
                        <input type="radio" name="box" value = "Distributor" />Distributor/Dealer
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" required />
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b><a href="SignUp.php">New User??</a>&nbsp;
                        <a href="SignUp.php">Sign Up</a></b>
                        
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

