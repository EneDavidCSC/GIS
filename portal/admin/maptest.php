<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Interactive Map with Database Markers</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

  <style>
    /* Style the map container */
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <!-- Leaflet JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

  <script>
    // Initialize the map
    var mymap = L.map('map').setView([9.064987, 6.566891], 13); // Set initial coordinates and zoom level

    // Add base layers (different map views)
    var streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    // Layer control for switching between views
    var baseLayers = {
      "Streets": streets,
      "Satellite": satellite
    };

    L.control.layers(baseLayers).addTo(mymap);

    // PHP code to fetch marker locations and links from the database
    <?php
    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "leave_staff";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch marker locations and links from the database
    $markers_query = "SELECT * FROM map"; 
    $markers_result = mysqli_query($conn, $markers_query);

    while ($row = mysqli_fetch_assoc($markers_result)) {
      // Extract latitude, longitude, and link from each row
      $latitude = $row['latitude'];
      $longitude = $row['longitude'];
      $link = $row['link'];

      // Add markers with links to the map
      echo "var marker = L.marker([$latitude, $longitude]).addTo(mymap);";
      echo "marker.bindPopup('<a href=\"$link\">view</a> to visit the link and open a window with a button');";
      echo "marker.on('click', function(e) {
        var popup = e.target.getPopup();
        var content = popup.getContent() + '<br><button onclick=\"window.location.href=\'' + \"$link\" + '\'\">Go</button>';
        popup.setContent(content);
      });";
    }
    ?>
  </script>
</body>
</html>
