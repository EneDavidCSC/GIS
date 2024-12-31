<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
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
								<h4>Profiling</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profiling</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="card-box mb-30">
				<div class="pd-20">
						<h2>Crime Profiles</h2>
					</div>
                    
<?php
// Function to retrieve and display feedback from the database
function displayProfileFromDatabase($searchTerm = null) {
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

    // Prepare and execute SQL statement to retrieve feedback from the database
    $sql = "SELECT * FROM tblcrimes";
   
    // Add search condition if a search term is provided
    if ($searchTerm !== null) {
        $escapedSearchTerm = $conn->real_escape_string($searchTerm);
        $sql .= " WHERE Crime LIKE '%$escapedSearchTerm%'";
    }

    $sql .= " ORDER BY Date DESC";

    $result = $conn->query($sql);

    // Display profile
    
if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Gender</th>';
    echo '<th>Date of Birth</th>';
    echo '<th>Occupation</th>';
    echo '<th>Address</th>';
    echo '<th>Number</th>';
    echo '<th>Crime</th>';
    echo '<th>Location</th>';
    echo '<th>Date</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['FirstName'] . '</td>';
        echo '<td>' . $row['LastName'] . '</td>';
        echo '<td>' . $row['Gender'] . '</td>';
        echo '<td>' . $row['Dob'] . '</td>';
        echo '<td>' . $row['Occupation'] . '</td>';
        echo '<td>' . $row['Address'] . '</td>';
        echo '<td>' . $row['Number'] . '</td>';
        echo '<td>' . $row['Crime'] . '</td>';
        echo '<td>' . $row['Location'] . '</td>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No profile available.';
}


    // Close the connection
    $conn->close();
}

// Sample usage for searching
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = htmlspecialchars($_POST['search']);
} else {
    $searchTerm = null;
}


?>

<div>
    <form method="post" action="">
        <label for="search">Search :</label>
        <input type="text" name="search" id="search" value="<?= $searchTerm ?>">
        <button type="submit">Search</button>
    </form>
</div>

    <hr>

    <h2></h2>
    <?php
    // Display profile from the database based on the search term
    displayProfileFromDatabase($searchTerm);
    ?>

            </div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>