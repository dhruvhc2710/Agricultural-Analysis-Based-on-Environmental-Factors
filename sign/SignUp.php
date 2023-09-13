<html>
    <head>
        <title>Farmi/SIGN UP Page</title>
        <link href="style1.css" rel="stylesheet" type="text/css">
		  
    <style>
        .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <?php
// define variables and set to empty values
$nameErr = $UserErr = $passErr = $cpassErr = $adharErr = $addressErr =  $OptionErr = $phnoErr= $CityErr = "";
$name = $user = $pass = $cpass = $adhar = $address = $option =$mainErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["full_uname"])) {
    $nameErr = " Full Name is required";
  } else {
    $name = test_input($_POST["full_uname"]);
  }
  
  if (empty($_POST["uname"])) {
    $UserErr = "Username is required";
  } else {
    $user = test_input($_POST["uname"]);
  }
    
  if (empty($_POST["pwd"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pwd"]);
  }

  if (empty($_POST["cpwd"])) {
    $cpassErr = "Confirm password is not Same";
  } else {
    $cpass = test_input($_POST["cpwd"]);
  }

  if (empty($_POST["adhar"])) {
    $adharErr = "Adhar number is required";
  } else {
    $adhar = test_input($_POST["adhar"]);
  }
    if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
    if (empty($_POST["box"])){
        $OptionErr =" An Option must be select.";
        
    }else {
        $option = test_input($_POST["box"]);
    }
    if (empty($_POST["phno"])){
        $phnoErr ="You entered a wrong number";
    }
    if (empty($_POST["city"])){
        $CityErr = "City is required";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <div class="container" >
		<form method="post" action="insertdata.php">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div id="div_login">
                    <h1>Sign Up</h1>
                    <p><span class="error">* required field</span></p>
                    <span class="error"><?php echo $mainErr;?></span>
                    <div>
                        <input type="radio" name="box" value = "farmer"/>Farmer
                        <input type="radio" name="box" value ="Distributor"/>Distributor/Dealer
                        <span class="error">* <?php echo $OptionErr;?></span>
                    </div>
                    <div>
                        Full Name:<br>
                        <input type="text" class="textbox" id="full_uname" name="full_uname" placeholder="Lastname Middle Firstname" />
                        <span class="error">* <?php echo $nameErr;?></span>
                        <br><br>
                    </div>
                    
                    <div>
                        Username:<br>
                        <input type="text" class="textbox" id="txt_uname" name="uname" placeholder="Username" />
                        <span class="error">* <?php echo $UserErr;?></span><br><br>
                    </div>
                    <div>
                        Password:<br>
                        <input type="password" class="textbox" id="txt_uname" name="pwd" placeholder="Password"/>
                        <span class="error">* <?php echo $passErr;?></span><br><br>
                    </div>
                    <div>
                        Confirm Password:<br>
                        <input type="password" class="textbox" id="txt_uname" name="cpwd" placeholder="CPassword"/>
                        <span class="error">* <?php echo $cpassErr;?></span><br><br>
                    </div>
                    <div>
                        Adhar Card no:<br>
                        <input type="number" maxlength="16" minlength="16" size="16" class="textbox" id="adharcard"
                               name="adhar" placeholder="AdharCard number"/>
                        <span class="error">* <?php echo $adharErr;?></span><br><br>
                        
                    </div>
                     <div>
                        Phone Number:<br>
                        <input name="phno"  class="textbox" size="10" placeholder="Phone number"/>
                        <span class="error">* <?php echo $phnoErr;?></span><br><br>
                    </div>
                    <div>
                        Address:<br>
                        <textarea name="address" rows="5" cols="40" placeholder="Detail Address"></textarea>
                        <span class="error">* <?php echo $addressErr;?></span><br><br>
                    </div>
                     <div>
                        City:<br>
                        <input type="text" class="textbox" id="textbox" name="city" placeholder="City" />
                        <span class="error">* <?php echo $CityErr;?></span><br><br>
                    </div>
                    <div>
                        <input type="submit" style ="text-align:center " value="Sign Up" name="but_submit" id="but_submit" />
                        
                    </div>
                </div>
            </form>
			</form>
        </div>
    </body>
</html>

