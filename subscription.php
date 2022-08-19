<html>

  <head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    p.ridge {border-style: ridge;}
    </style>
  </head>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="ds2.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>

      </ul>
    </div>
  </div>
    </nav>
</br></br>
</br>
</br>

  
<?php
include("auth_session.php");
?>
<h1 align="center"> My Subscription Page </h1>
<p align="center"><?php echo $_SESSION['username']; ?>'s Movies List</p>

<?php

$username = $_SESSION['username'];

            
            $db= new mysqli ("localhost", "root", "Raman1313","assignment");

            if($db->connect_error)     //checking connection error if any
            {
                die("Connection failed: " . $db->$connecr_error);
            }
            
            $q="SELECT * FROM  userSubscriptions WHERE username ='$username';";
        $Result= $db->query($q);



$sql = "SELECT id, username, mid FROM userSubscriptions WHERE username='$username'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

$id = $row["mid"];

$url=file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=b714de959ed5356f4cfaf3315967d457");
$r = json_decode($url,true);
$title = $r['original_title'];
echo "<div class='col-md-4 mx-auto'><div align='center' class='border p-5'>";
    echo "<h3>";
      echo $title;
      echo "</h3></br>";
echo "<a href='detail.php?id=$id'><img src='https://image.tmdb.org/t/p/original" . $r['poster_path'] . " ' width='200' height='300' /></a>";
echo "</br><a href='unsubscribe.php?id=$id'>     Unsubscibe?</a></div></div>";
echo "</br>";
}


}

            

?>

</body>
</html>
