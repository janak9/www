// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
   var locations = [
      ['Videohive Company', 38.781409, -77.187706, 5],
      ['Audiojungle Company', 39.048234, -74.859240, 4],
      ['Codecanyon Company', 39.933417, -75.196809, 3],
      ['Graphicriver Company', 28.495179, -81.219848, 2],
      ['Themeforest Company', 40.844342, -73.872756, 1]
    ];

    var map = new google.maps.Map(document.getElementById('custom-map-job-map'), {
      zoom: 5,
      center: new google.maps.LatLng(36.596853, -94.356844),
        scrollwheel: false,
        zoomControl: false,
        streetViewControl: false,
        styles: [{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"saturation":"0"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"weight":"3.21"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"weight":"2.15"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"weight":"1.50"}]}]
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: {
            url: "assets/images/map-marker.svg",
            scaledSize: new google.maps.Size(60, 60)
        }
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    

    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    // var mapOptions = {
    //     // How zoomed in you want the map to start at (always required)
    //     zoom: 5,
    //     scrollwheel: false,
    //     draggable: false,
    //     zoomControl: false,
    //     streetViewControl: false,
    //     styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#153b4a"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"simplified"},{"color":"#b5b5ba"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#153b4a"},{"visibility":"on"},{"weight":"3.00"},{"lightness":"-30"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#72a1b3"},{"visibility":"on"},{"lightness":"0"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"off"},{"color":"#bf1b1b"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#00b7ff"},{"lightness":"-21"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"},{"color":"#ff0000"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#153b4a"},{"lightness":"-10"},{"saturation":"-5"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#153b4a"},{"lightness":"-27"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#153b4a"},{"lightness":"-37"},{"saturation":"14"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#8ec9e0"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#a7ced8"},{"lightness":"-46"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#2b2b2b"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]}]

        
    //     center: myLatlng, // New York

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
    // };
}
