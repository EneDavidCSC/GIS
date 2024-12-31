<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    
    <!-- Leaflet JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/favicon-32x32.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>
    <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>GIS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">GIS</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="card-box mb-30">
				<div class="pd-20">
						<h2 >GIS</h2>
					</div>

                    <div class="map-container" id="map"></div>

                    <script>
    // Initialize the map
    var mymap = L.map('map').setView([51.505, -0.09], 13); // Set initial coordinates and zoom level

    // Add a tile layer to the map (using OpenStreetMap tiles)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(mymap);

    // You can add markers, polygons, or other interactive elements to the map as needed
    // For example, adding a marker:
    var marker = L.marker([51.5, -0.09]).addTo(mymap); // Add a marker at specific coordinates
    marker.bindPopup("<b>Hello!</b><br />This is a marker.").openPopup(); // Add a popup to the marker
</script>


                    </div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>