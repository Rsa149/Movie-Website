<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
	<li class="nav-item">
          <a class="nav-link" href="login.php">Log In</a>
        </li>
        
      </ul>
    </div>
  </div>
    </nav>
</br></br>
</br>
</br>
</br>
</br>


<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $v_key = bin2hex(random_bytes(16));
        $query    = "INSERT into `users` (username, password, email,`verification_code`, `is_verified`)
                     VALUES ('$username', '" . md5($password) . "', '$email','$v_key','0')";
         if ($query)  {
$to = $email;
$subject="Email Verification";
$message = "<a href='https://singhr.ursse.org/verify.php?v_key=$v_key'> Register Account </a>";
$headers = "From: raman@singhr.ursse.org \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8"  . "\r\n";

mail($to,$subject,$message,$headers);
}

        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3 align='center'>Check your email for verification.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
?>
<form  align="center" class="form" action="" method="post">
 
        <h1 class="login-title">Registration</h1></br>
        <input type="text" class="login-input" name="username" placeholder="Username" required /></br></br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress"></br></br>
        <input type="password" class="login-input" name="password" placeholder="Password"></br></br>
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>

</body>
</html>
