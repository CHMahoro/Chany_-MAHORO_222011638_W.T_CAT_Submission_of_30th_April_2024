 <?php
// Connection details
include 'database.php';

// Check if digest_id is set
if(isset($_REQUEST['DigestID'])) {
    $DigestID = $_REQUEST['DigestID'];
    
    // Check if the form is submitted for deletion
    if(isset($_POST['confirm_delete'])) {
        // Prepare and execute the DELETE statement
        $stmt = $connection->prepare("DELETE FROM digestconfiguration WHERE DigestID=?");
        $stmt->bind_param("i", $DigestID);
        
        // Execute the delete operation
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        // Display confirmation form
        echo "<form method='post'>
                <p>Are you sure you want to delete this record?</p>
                <input type='submit' name='confirm_delete' value='Yes'>
                <a href='Digest Configuration.php'>No, Go Back</a>
              </form>";
    }
} else {
    echo "DigestID is not set.";
}

$connection->close();
?>

 