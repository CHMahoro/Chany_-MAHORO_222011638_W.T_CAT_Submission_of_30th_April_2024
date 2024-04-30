<?php
// Connection details
include 'database.php';

// Check if HistoryID is set
if(isset($_REQUEST['HistoryID'])) {
    $HistoryID = $_REQUEST['HistoryID'];
    
    // JavaScript confirmation for deletion
    echo '<script>
            function confirmdelete() {
              return confirm("Are you sure you want to delete this record?");
            }
          </script>';
    
    // Prepare and execute the DELETE statement after confirmation
    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
        $stmt = $connection->prepare("DELETE FROM readinghistory WHERE HistoryID=?");
        $stmt->bind_param("i", $HistoryID);
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
            // Redirect to appropriate page
            echo '<script>window.location.href = "Reading History.php";</script>';
        } else {
            echo "Error deleting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Display confirmation dialog
        echo '<form method="post" onsubmit="return confirmdelete()">
                <input type="hidden" name="confirm_delete" value="yes">
                <input type="submit" value="Delete Record">
              </form>';
    }
} else {
    echo "HistoryID is not set.";
}

$connection->close();
?>
