<?php
// Connection details
include 'database.php';

// Check if UserID is set
if (isset($_REQUEST['UserID'])) {
    $UserID = $_REQUEST['UserID'];

    // Retrieve user details for the selected user
    $stmt = $connection->prepare("SELECT * FROM userprofile WHERE UserID=?");
    $stmt->bind_param("i", $UserID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Username = $row['Username'];
        $Email = $row['Email'];
        $Preferences = $row['Preferences'];
        $ReadingHistory = $row['ReadingHistory'];
        $SubscriptionStatus = $row['SubscriptionStatus'];
    } else {
        echo "User not found.";
    }

    // Close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* Include your CSS styles here */
    </style>
</head>
<body>
<header>
    <!-- Header content -->
</header>
<section>
    <h1><u>User Profile Form</u></h1>
    <form method="post" onsubmit="return confirmUpdate()">
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" value="<?php echo isset($Username) ? htmlspecialchars($Username, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" value="<?php echo isset($Email) ? htmlspecialchars($Email, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Preferences">Preferences:</label>
        <input type="text" id="Preferences" name="Preferences" value="<?php echo isset($Preferences) ? htmlspecialchars($Preferences, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="ReadingHistory">Reading History:</label>
        <input type="text" id="ReadingHistory" name="ReadingHistory" value="<?php echo isset($ReadingHistory) ? htmlspecialchars($ReadingHistory, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="SubscriptionStatus">Subscription Status:</label>
        <input type="text" id="SubscriptionStatus" name="SubscriptionStatus" value="<?php echo isset($SubscriptionStatus) ? htmlspecialchars($SubscriptionStatus, ENT_QUOTES) : ''; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    // Handle update operation
    if (isset($_POST['update'])) {
        // Retrieve updated values from the form
        $Username = htmlspecialchars($_POST['Username'], ENT_QUOTES);
        $Email = htmlspecialchars($_POST['Email'], ENT_QUOTES);
        $Preferences = htmlspecialchars($_POST['Preferences'], ENT_QUOTES);
        $ReadingHistory = htmlspecialchars($_POST['ReadingHistory'], ENT_QUOTES);
        $SubscriptionStatus = htmlspecialchars($_POST['SubscriptionStatus'], ENT_QUOTES);

        // Update the user profile in the database
        $stmt = $connection->prepare("UPDATE userprofile SET Username=?, Email=?, Preferences=?, ReadingHistory=?, SubscriptionStatus=? WHERE UserID=?");
        $stmt->bind_param("sssssi", $Username, $Email, $Preferences, $ReadingHistory, $SubscriptionStatus, $UserID);
        if ($stmt->execute()) {
            echo "User profile updated successfully.";
            // Redirect to User Profile.php
            echo '<script>window.location.href = "User Profile.php";</script>';
        } else {
            echo "Error updating user profile: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    <!-- Additional content or table of users can be added here -->
</section>
<footer>
    <!-- Footer content -->
</footer>
<script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update this record?");
    }
</script>
</body>
</html>
