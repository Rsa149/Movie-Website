<?php
 require('db.php');

if(isset($_GET['v_key'])){
$v_key = $_GET['v_key'];

$result = $con->query("SELECT verification_code , is_verified from users WHERE verification_code ='$v_key' AND is_verified = 0");

if ($result->num_rows == 1){
$update = $con->query("UPDATE users SET is_verified = 1  WHERE verification_code = '$v_key'");
if($update){
echo "Your account has been verified. You can now log in.";
echo "<html></br>Click here to <a href='login.php'> Log In</html>";
}

else {
echo $con->error;
}
}
else {echo "This account is already verified";}

}
else {
echo "something	went wrong";
}
?>
<html>

<body>

</body>

</html>