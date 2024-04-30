<?php
session_start();

// Connection details
include 'database.php';
$error = ""; // Initialize error variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize user input
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Prepare and execute SQL statement to prevent SQL injection
    $sql = "SELECT email, password FROM admin WHERE email=?";
    $stmt = $connection->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the hashed password
            if ($password == $row['password']) {

                $_SESSION['UserID'] = $row['id']; // Use lowercase 'id' for consistency
                header("Location: home.php"); // Redirect to home page after successful login
                exit();
            } else {
                $error = "Invalid email or password"; // Set error message if password is incorrect
            }
        } else {
            $error = "User not found"; // Set error message if user does not exist
        }
    } else {
        // Error handling for prepared statement failure
        $error = "Database error: " . $connection->error;
    }

    // Close statement
    
} else {
    // Handling case when form is not submitted
    $error = "Please fill out the login form";
}

// Perform additional SQL query to fetch data from 'admin' table
$sql_admin = "SELECT * FROM `admin`";
$result_admin = $connection->query($sql_admin);

// Check if the query was successful
if ($result_admin) {
    // Fetching the data
    while ($row_admin = $result_admin->fetch_assoc()) {
        // Process or output the data as needed
        // For example:
        // echo "Admin ID: " . $row_admin["id"] . ", Admin Email: " . $row_admin["email"] . "<br>";
    }
} else {
    // Output an error message if the query fails
    // echo "Error executing query: " . $connection->error;
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body bgcolor="chocolate">
    <h2>Admin Login Form</h2>
    <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <script>
        // JavaScript confirmation prompt before submitting the form
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var confirmLogin = confirm("Do you want to login?");
            if (!confirmLogin) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        });
    </script>
    <p><?php echo $error; ?></p>
    <p>Not registered yet? <a href="register.php">Register here</a></p>
    <p>Do you want to logout? <a href="logout.php">Logout here</a></p>
</body>
</html>
