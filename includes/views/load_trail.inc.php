
<!-- Google API key: AIzaSyBHZvUPwL77h619fuPWHSSodVSsgoz51n0



 -->
<?php
  
  $selected_trail = $_POST['selected_trail'];
  
  $googlemaps_api = "
            <div id='map'></div>
    <script>

      var map;
      var flightPath;
      var selected_trail = '$selected_trail';
   

      var path_array = selected_trail.split(',');
      var path_array_float = new Array();
      var path_extended = new Array();

      for (var i=0; i < path_array.length; i++)
      {
        path_array_float[i] = parseFloat(path_array[i]);
      }

      var j = 0;
      for (var i=0; i < path_array_float.length-1; i++) 
      { 
          path_extended[j]=
          {lat: path_array_float[i], lng: path_array_float[i+1]};
          j++;
          i++;
      }


 
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: 59.853642, lng: 17.634966},
          mapTypeId: 'terrain'
        });

        path = new google.maps.Polyline({
          path: path_extended,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

      path.setMap(map);
}
      
    </script>
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBHZvUPwL77h619fuPWHSSodVSsgoz51n0&callback=initMap'>
    </script>
            ";
  echo $googlemaps_api;
  echo "<button id='upvote_trail_button'>Up vote</button>";
  echo "<button id='downvote_trail_button'>Down vote</button>";
