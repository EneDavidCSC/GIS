<?php
// Function to save user feedback to a database
function saveFeedbackToDatabase($feedback) {
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

    // Escape special characters to prevent SQL injection
    $escapedFeedback = $conn->real_escape_string($feedback);

    // Prepare and execute SQL statement to insert feedback into the database
    $stmt = $conn->prepare("INSERT INTO report (timestamp, message) VALUES (NOW(), ?)");
    $stmt->bind_param("s", $escapedFeedback);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();
}

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

// Sample form for users to submit feedback
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crime Tracking System</title> 
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="src/fonts/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">CGITS</a>
      </div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">
    <div class="title">Crime Geographical Information Tracking System</div>
    <div class="sub_title">Report a Crime</div>
    <div class="btns">
    <form method="post" action="">
        <label for="report">Report:</label>
        <textarea name="report" id="report" required></textarea>
        <button type="submit">Submit Report</button>
    </form>
    </div>
  </div>
  
</body>
</html>
