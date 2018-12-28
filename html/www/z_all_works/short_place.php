<style type="text/css">
  #map{
    height: 500px;
    width: 500px;
  }
</style>
<div class="map_container">
	<div class="map_content">
	   <div id="map"></div>
    <div id="right-panel">
    <div>
    <b>Start:</b>
    <select id="start">
      <option value="Surat,IN">Surat,IN</option>
      <option value="Delhi,IN">Delhi,IN</option>
      <option value="Pune,IN">Pune,IN</option>
      <option value="Vadodara, IN">Vadodara, IN</option>
    </select>
    <br>
    <b>Waypoints:</b> <br>
    <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br>
    <select multiple id="waypoints">
      <option value="Mumbai,IN">Mumbai,IN</option>
       <option value="Bengaluru,IN">Bengaluru,IN</option>
      <option value="Pune,IN">Pune,IN</option>
      <option value="Kochi, IN">Kochi, IN</option>
      <option value="Vadodara, IN">Vadodara, IN</option>
      <option value="Delhi,IN">Delhi,IN</option>
      <option value="Bharuch, IN">Bharuch, IN</option>
      <option value="Navsari, IN">Navsari, IN</option>
      <option value="Bhavnagar, IN">Bhavnagar, IN</option>
      <option value="Rajkot, IN">Rajkot, IN</option>
      <option value="Latur, IN">Latur, IN</option>
      <option value="Udupi, IN">Udupi, IN</option>
    </select>
    <br>
    <b>End:</b>
    <select id="end">
      <option value="Surat,IN">Surat,IN</option>
       <option value="Bengaluru,IN">Bengaluru,IN</option>
      <option value="Pune,IN">Pune,IN</option>
      <option value="Kochi, IN">Kochi, IN</option>
      <option value="Vadodara, IN">Vadodara, IN</option>
      <option value="Bharuch, IN">Bharuch, IN</option>
      <option value="Navsari, IN">Navsari, IN</option>
      <option value="Bhavnagar, IN">Bhavnagar, IN</option>
      <option value="Rajkot, IN">Rajkot, IN</option>
      <option value="Latur, IN">Latur, IN</option>
      <option value="Udupi, IN">Udupi, IN</option>
    </select>
    <br>
      <input type="submit" id="submit" name="btn_map_submit">
    </div>
    <div id="directions-panel"></div>
    </div>
  </div>
</div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 20.593684, lng: 78.96288}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          console.log(response);
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIE92HcJNtPloQ6FNTTu-ctyDzf1rkzWw&callback=initMap">
    </script>