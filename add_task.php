<?php
$servername = "localhost"; // Usually "localhost" for local server
$username = "root"; // Your database username
$password = ""; // Your database password (often empty by default)
$dbname = "todo_app"; // The name of your database
$port = 3308;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get task description from the form
    $task_description = $_POST['task'];

    // Basic validation (preventing empty tasks)
    if (!empty($task_description)) {
        // Prepare and bind (to prevent SQL injection - good practice even in mini-projects)
        $stmt = $conn->prepare("INSERT INTO tasks (task_description) VALUES (?)");
        $stmt->bind_param("s", $task_description); // "s" indicates the parameter is a string

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to the main page after adding
            header("Location: index.php");
            exit(); // Important to exit after header redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Task description cannot be empty.";
    }
}

$conn->close();
?>