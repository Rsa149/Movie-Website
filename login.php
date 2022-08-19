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
          <a class="nav-link" href="registration.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>
</br></br></br></br></br>

<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $res = $con->query("SELECT * FROM users WHERE username ='$username'");
        $r = $res->fetch_assoc();
        $verified = $r['is_verified'];
        $rows = mysqli_num_rows($result);
	if ($rows == 1) {
  if ( $verified == 1){
$_SESSION['username'] = $username;
// Redirect to user dashboard page
header("Location: ds2.php");
}
else

{
echo "Your account is not verified yet. Check your e-mail for verification.";
echo "<html> <a href='login.php'> Log In Page </a></html>";
}
        } else {
            echo "<div class='form'>
                  <h3 align='center'>Incorrect Username/password.</h3><br/>
                  
</div>";

echo "<form align='center' class='form' method='post' name='login'>

      <h1 class='login-title'>Login</h1></br>
        <input type='text' class='login-input' name='username' placeholder='Username' autofocus='true'/></br></br>
        <input type='password' class='login-input'  name='password' placeholder='Password'/></br></br>
        <input type='submit' value='Login'  name='submit' class='login-button'/></br></br>
        <p class='link'><a href='registration.php'>New Registration</a></p>
  </form>";
        }
    } else {
?>
    <form align="center" class="form" method="post" name="login">
       
      <h1 class="login-title">Login</h1></br>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/></br></br>
        <input type="password" class="login-input"  name="password" placeholder="Password"/></br></br>
        <input type="submit" value="Login"  name="submit" class="login-button"/></br></br>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
    ?>
    
</body>
</html>
