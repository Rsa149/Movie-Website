<html>

  <head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>

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

    <h1 align="center"> Movie Detail </h1>
	
<?php

$id = $_GET['id'];
$json = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=b714de959ed5356f4cfaf3315967d457");


$result = json_decode($json,true);

$title = $result['original_title'];
echo "<div class='col-md-4 mx-auto'><div align='center' class='border p-5'>";
echo "<h2>";
echo $title;
echo "</h2>";
echo "<br/>";

echo "<img src='https://image.tmdb.org/t/p/original" . $result['poster_path'] . " ' width='200' height='300'/><br/>";

$overview= $result['overview'];

echo "<h4> Overview </h4>";
	echo $overview;
echo "</br></div></div>";
$video = file_get_contents("https://api.themoviedb.org/3/movie/$id/videos?api_key=b714de959ed5356f4cfaf3315967d457");
$video = json_decode($video,true);

foreach($video['results'] as $result){
$type = $result['type'];
$name = $result['name'];
}
echo "</br>";
if($name == 'Official Trailer' || $type=='Trailer'){

$y_key = $result['key'];
echo "<div class='col-md-4 mx-auto'><div align='center' class='border p-5'>";
echo "<h2> Video Trailer </h2></br><iframe width='420' height='315'
src='https://www.youtube.com/embed/" .$y_key."'>
</iframe></div></div>";
}
else {
foreach($video['results'] as $result){
echo "<div class='col-md-4 mx-auto'><div align='center' class='border p-5'>";
echo "</br><h1> Related Videos </h1> </br> <h3>";
echo  $result['name'] ;
echo "  </h3> ";
$z_key= $result['key'];
echo "<iframe width='420' height='315'
src='https://www.youtube.com/embed/" .$z_key."'>
</iframe></div></div></br>";
}
echo "no key";
}






?>


</body>
</html>
