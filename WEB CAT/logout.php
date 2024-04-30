<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body bgcolor="chocolate">
    <h2>Logout</h2>
    
    <?php
    // Start the session
    session_start();
    
    // Check if the user is logged in
    if(isset($_SESSION['UserID'])) {
        // If logged in, destroy the session
        session_destroy();
        echo "<p>You have been successfully logged out.</p>";
    } else {
        // If not logged in, display a message
        echo "<p>You are already logged out.</p>";
    }
    ?>
    
    <script>
        function confirmLogout() {
            var confirmation = confirm("Are you sure you want to logout?");
            if (confirmation) {
                window.location.href = "index.php"; // Redirect to logout page
            }
        }
    </script>
    
    <p><button onclick="confirmLogout()">Logout</button></p>
</body>
</html>
