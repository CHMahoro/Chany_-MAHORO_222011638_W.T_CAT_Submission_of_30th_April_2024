<?php
// Connection details
include 'database.php';

// Check if LogID is set
if (isset($_REQUEST['LogID'])) {
    $LogID = $_REQUEST['LogID'];

    // JavaScript confirmation for deletion
    echo '<script>
            function confirmDelete() {
              return confirm("Are you sure you want to delete this record?");
            }
          </script>';

    // Prepare and execute the DELETE statement after confirmation
    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
        $stmt = $connection->prepare("DELETE FROM notificationlog WHERE LogID=?");
        $stmt->bind_param("i", $LogID);
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
            // Redirect to appropriate page
            echo '<script>window.location.href = "Notification Log.php";</script>';
        } else {
            echo "Error deleting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Display confirmation dialog
        echo '<form method="post" onsubmit="return confirmDelete()">
                <input type="hidden" name="confirm_delete" value="yes">
                <input type="submit" value="Delete Record">
              </form>';
    }
} else {
    echo "LogID is not set.";
}

$connection->close();
?>
