<!doctype html>
<?php
require 'config/humans.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<br>";
$gallery_string = $_SERVER['REDIRECT_QUERY_STRING'];
echo $_SERVER['REDIRECT_QUERY_STRING'];
echo "<br>Public Gallery";




$linklist = mysqli_query($con, "SELECT nfturl FROM humanlists WHERE hgallery = '" . $gallery_string . "'");


echo "<div class='card-columns'>";

foreach ($linklist as $link) {

  echo "<div class='card' style='width:400px'>
  <img class='card-img-top' src='" . $link['nfturl'] . "' alt='Card image'>";
  echo "<div class='card-body'>";
  echo "</div>
</div>";
};

echo "</div>";

?>

<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>