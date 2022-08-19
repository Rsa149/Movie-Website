
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
    <div align="center" class="collapse navbar-collapse" id="mynavbar">
      <ul align="center" class="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="ds2.php">Dashboard</a>
</li>
<li class="nav-item">
          <a class="nav-link" href="subscription.php">My Movies</a>
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



<body>
<?php
include("auth_session.php");
?>
<h1 alig="center"> Dashboard Page </h1>
<h2 align="center"> Welcome, <?php echo $_SESSION['username']; ?>!</h2>

<?php

$data = file_get_contents("https://api.themoviedb.org/3/trending/all/day?api_key=b714de959ed5356f4cfaf3315967d457");
$data = json_decode($data,true);

foreach($data['results'] as $result){
$id = $result['id'];
echo "<div class='col-md-4 mx-auto'><div align='center' class='border p-5'>";
echo "<a href='detail.php?id=$id'><h2>".$result['original_title']."</h2></a>";

$detail = $result['overview'];
echo "<a href='detail.php?id=$id'><img src='https://image.tmdb.org/t/p/original" . $result['poster_path'] . " ' width='200' height='300'/></a>";
echo "</br><button onclick='myFunction()'><a href='subscribe.php?id=$id'> Subscibe</a></button></div></div></br>";
}
?>

<script>
function myFunction() {
  alert("Subscribed");
}
</script>

</body>
</html>
