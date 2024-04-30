<?php
// Connection details
include 'database.php';

// Check if LogID is set
if (isset($_REQUEST['LogID'])) {
    $LogID = $_REQUEST['LogID'];

    // Retrieve notification log details for the selected log
    $stmt = $connection->prepare("SELECT * FROM notificationlog WHERE LogID=?");
    $stmt->bind_param("i", $LogID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $UserID = $row['UserID'];
        $NotificationType = $row['NotificationType'];
        $Timestamp = $row['Timestamp'];
        $Status = $row['Status'];
    } else {
        echo "Log not found.";
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
    <title>Notification Log Update Form</title>
    <style>
        /* Include your CSS styles here */
    </style>
</head>
<body>
<header>
    <!-- Header content -->
</header>
<section>
    <h1><u>Notification Log Update Form</u></h1>
    <form method="post" onsubmit="return confirmUpdate()">
        <label for="UserID">User ID:</label>
        <input type="text" id="UserID" name="UserID" value="<?php echo isset($UserID) ? htmlspecialchars($UserID, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="NotificationType">Notification Type:</label>
        <input type="text" id="NotificationType" name="NotificationType" value="<?php echo isset($NotificationType) ? htmlspecialchars($NotificationType, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Timestamp">Timestamp:</label>
        <input type="text" id="Timestamp" name="Timestamp" value="<?php echo isset($Timestamp) ? htmlspecialchars($Timestamp, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Status">Status:</label>
        <input type="text" id="Status" name="Status" value="<?php echo isset($Status) ? htmlspecialchars($Status, ENT_QUOTES) : ''; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    // Handle update operation
    if (isset($_POST['update'])) {
        // Retrieve updated values from the form
        $UserID = htmlspecialchars($_POST['UserID'], ENT_QUOTES);
        $NotificationType = htmlspecialchars($_POST['NotificationType'], ENT_QUOTES);
        $Timestamp = htmlspecialchars($_POST['Timestamp'], ENT_QUOTES);
        $Status = htmlspecialchars($_POST['Status'], ENT_QUOTES);

        // Update the notification log in the database
        $stmt = $connection->prepare("UPDATE notificationlog SET UserID=?, NotificationType=?, Timestamp=?, Status=? WHERE LogID=?");
        $stmt->bind_param("isssi", $UserID, $NotificationType, $Timestamp, $Status, $LogID);
        if ($stmt->execute()) {
            echo "Notification log updated successfully.";
            // Redirect to Notification Log.php
            echo '<script>window.location.href = "Notification Log.php";</script>';
        } else {
            echo "Error updating notification log: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    <!-- Additional content or table of logs can be added here -->
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
