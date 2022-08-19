<html>

<body>


<?php

include("auth_session.php");
$username = $_SESSION['username'];    
   
    
            $mid = $_GET['id'];
	    echo $mid;

            $db= new mysqli ("localhost", "root", "Raman1313","assignment");

            if($db->connect_error)     //checking connection error if any
            {
                die("Connection failed: " . $db->$connecr_error);
            }
            else {

echo "Database Connected";
}
            $Q = "INSERT INTO userSubscriptions (username,mid) VALUES ('$username' , '$mid');";


            $result = $db->query($Q);

header("Location: ds2.php");          
      ?>
</body>
</html>
