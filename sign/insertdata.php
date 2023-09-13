<?php
include "config.php";

if(isset($_POST['but_submit'])){ 
$name = $_POST['full_uname'];
$user = $_POST['uname'];
$city = $_POST['city'];
$phoneno = $_POST['phno'];
$password = $_POST['pwd'];
$box = $_POST['box'];
$adhar = $_POST['adhar'];
$address = $_POST['address'];
if($name !=''&& $password !='' && $phoneno !='' && $adhar !='' && $city !='' ){

$query ="insert into users(category, username, name, password, adhar,address,phoneno,city)values('$box','$user','$name', '$password', '$adhar', '$address','$phoneno','$city')";

if(mysqli_query($con, $query))
{
	echo "Records added successfully.";
	header("Location:index.php");
} else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
    }

}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($con); 
?>
