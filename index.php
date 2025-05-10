<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskify - My To-Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #f0f2f5; /* Light gray background */
            --card-bg: #ffffff; /* White card background */
            --accent-purple: #6f42c1; /* A vibrant purple for accents */
            --accent-blue: #007bff; /* A common blue for buttons */
            --text-dark: #333;
            --text-light: #666;
            --border-light: #e0e0e0;
            --shadow-light: rgba(0, 0, 0, 0.08);
            --dot-red: #fd7e14;
            --dot-green: #28a745;
            --dot-blue: #007bff;
            --dot-purple: #6f42c1;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--primary-bg);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px; /* Adjust padding for overall spacing */
            box-sizing: border-box;
        }

        .container {
            background-color: var(--card-bg);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px var(--shadow-light);
            width: 100%;
            max-width: 700px; /* Increased max-width for better layout */
            box-sizing: border-box;
            position: relative; /* For positioning elements */
            overflow: hidden; /* Hide parts of circles outside */
        }

        /* Background circles - inspired by the image */
        .bg-circle-top-right {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background-color: rgba(0, 123, 255, 0.15); /* A light blue */
            border-radius: 50%;
            z-index: 0;
        }
        .bg-circle-bottom-left {
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 100px;
            height: 100px;
            background-color: rgba(253, 126, 20, 0.15); /* A light orange */
            border-radius: 50%;
            z-index: 0;
        }

        h1 {
            text-align: center;
            color: var(--accent-purple);
            margin-bottom: 30px;
            font-size: 2.2em;
            position: relative;
            z-index: 1;
        }

        /* Task Input Section */
        .task-input-section {
            background-color: #e9ecef; /* Light gray for input background */
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05); /* subtle inner shadow */
            position: relative;
            z-index: 1;
        }
        .task-input-section h2 {
            color: var(--text-dark);
            font-size: 1.5em;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .task-input-form {
            display: flex;
            gap: 10px; /* Space between input and button */
        }
        input[type="text"] {
            flex-grow: 1;
            padding: 12px 15px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-size: 1em;
            color: var(--text-dark);
            background-color: var(--card-bg); /* White input background */
        }
        input[type="text"]::placeholder {
            color: var(--text-light);
        }
        button[type="submit"] {
            padding: 12px 25px;
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Task List Section */
        .task-list-section h2 {
            color: var(--text-dark);
            font-size: 1.5em;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        ul {
            list-style: none;
            padding: 0;
            position: relative;
            z-index: 1;
        }
        li {
            background-color: var(--card-bg);
            border: 1px solid var(--border-light);
            padding: 15px 20px;
            margin-bottom: 12px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1em;
            color: var(--text-dark);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-left: 5px solid var(--accent-purple); /* Default accent bar */
        }
        li:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        li.dot-red { border-left-color: var(--dot-red); }
        li.dot-green { border-left-color: var(--dot-green); }
        li.dot-blue { border-left-color: var(--dot-blue); }
        li.dot-purple { border-left-color: var(--dot-purple); }


        .task-content {
            display: flex;
            align-items: center;
            flex-grow: 1;
        }
        .task-text {
            flex-grow: 1;
            font-weight: 400;
        }
        .task-actions {
            display: flex;
            gap: 10px;
        }
        .task-actions a {
            color: var(--accent-blue); /* Default link color */
            text-decoration: none;
            font-size: 0.9em;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .task-actions a.delete-btn {
            color: #dc3545; /* Red for delete */
            border: 1px solid #dc3545;
        }
        .task-actions a.delete-btn:hover {
            background-color: #dc3545;
            color: white;
        }
        .task-actions a.edit-btn { /* Placeholder for future edit button */
            color: var(--accent-blue);
            border: 1px solid var(--accent-blue);
        }
        .task-actions a.edit-btn:hover {
            background-color: var(--accent-blue);
            color: white;
        }
        .no-tasks {
            text-align: center;
            color: var(--text-light);
            font-style: italic;
            padding: 20px;
            background-color: #f3f3f3;
            border-radius: 8px;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }
            .task-input-form {
                flex-direction: column;
            }
            input[type="text"] {
                margin-right: 0;
                margin-bottom: 10px;
            }
            button[type="submit"] {
                width: 100%;
            }
            li {
                flex-direction: column;
                align-items: flex-start;
            }
            .task-actions {
                margin-top: 10px;
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="bg-circle-top-right"></div>
        <div class="bg-circle-bottom-left"></div>

        <h1>Taskify</h1>

        <div class="task-input-section">
            <h2>Add New Task</h2>
            <form action="add_task.php" method="POST" class="task-input-form">
                <input type="text" name="task" placeholder="What is your next task?" required>
                <button type="submit">Add Task</button>
            </form>
        </div>

        <div class="task-list-section">
            <h2>Today's Tasks</h2>
            <ul>
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

                // SQL query to fetch all tasks, ordered by creation date (newest first)
                $sql = "SELECT id, task_description FROM tasks ORDER BY created_at DESC";
                $result = $conn->query($sql);

                // Check if there are tasks to display
                if ($result->num_rows > 0) {
                    // Loop through each row (task) and display it
                    $dots = ['dot-purple', 'dot-blue', 'dot-red', 'dot-green'];
                    $dot_index = 0;
                    while($row = $result->fetch_assoc()) {
                        $current_dot = $dots[$dot_index % count($dots)];
                        $dot_index++;
                        echo "<li class='" . $current_dot . "'>";
                        echo "<span class='task-text'>" . htmlspecialchars($row["task_description"]) . "</span>"; // Use htmlspecialchars to prevent XSS
                        echo "<div class='task-actions'>";
                        // You could add an edit button here in the future
                        // echo "<a href='edit_task.php?id=" . $row["id"] . "' class='edit-btn'>Edit</a>";
                        echo "<a href='delete_task.php?id=" . $row["id"] . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this task?');\">Delete</a>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    // Message if no tasks are found
                    echo "<li><p class='no-tasks'>No tasks yet. Add one above!</p></li>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </ul>
        </div>
    </div>

</body>
</html>