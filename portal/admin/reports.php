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
								<h4>Reports</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reports</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                <div class="card-box mb-30">
				<div class="pd-20">
						<h2 >Crime Reports</h2>
					</div>
<?php

// Function to retrieve and display report from the database
function displayFeedbackFromDatabase() {
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

    // Prepare and execute SQL statement to retrieve report from the database
    $result = $conn->query("SELECT timestamp, message FROM report ORDER BY timestamp DESC");

    // Display report
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["timestamp"] . ": " . $row["message"] . "<br>";
        }
    } else {
        echo 'No reports available.';
    }

    // Close the connection
    $conn->close();
}

// Sample usage
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report'])) {
    $userFeedback = htmlspecialchars($_POST['report']);
    saveFeedbackToDatabase($userFeedback);
    echo 'Report sent successfully.';
}
// Display feedback from the database to admin
displayFeedbackFromDatabase();
?>


            </div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>