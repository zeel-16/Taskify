<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (often empty for XAMPP/WAMP root)
$dbname = "todo_app"; // The name of your database
$port = 3308; // The port you changed MySQL to use

// Create database connection with specified port
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the task ID is received via GET request (from the delete link)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize and validate the received ID
    $task_id = (int)$_GET['id']; // Cast to integer to ensure it's a number

    // Prepare the SQL DELETE statement to prevent SQL injection
    // Using prepared statements is crucial for security
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameter: "i" for integer type
    $stmt->bind_param("i", $task_id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If deletion is successful, redirect back to the main page
        header("Location: index.php");
        exit(); // Important to exit after header redirect
    } else {
        // If execution fails, show an error message
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

} else {
    // If no task ID was provided in the URL
    echo "Error: No task ID specified for deletion.";
    // Optionally, redirect back to index.php after a short delay or instantly
    // header("Location: index.php");
    // exit();
}

// Close the database connection
$conn->close();
?>