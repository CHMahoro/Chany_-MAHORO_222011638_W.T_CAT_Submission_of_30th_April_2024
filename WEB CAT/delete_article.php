<?php
// Connection details
include 'database.php';

// Check if ArticleID is set
if (isset($_REQUEST['ArticleID'])) {
    $ArticleID = $_REQUEST['ArticleID'];
    
    // JavaScript confirmation for deletion
    echo '<script>
            function confirmDelete() {
              return confirm("Are you sure you want to delete this article?");
            }
          </script>';
    
    // Check if the form is submitted for deletion
    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'Yes') {
        // Prepare and execute the DELETE statement
        $stmt = $connection->prepare("DELETE FROM newsarticle WHERE ArticleID=?");
        $stmt->bind_param("i", $ArticleID);
        
        // Execute the delete operation
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        // Display confirmation form
        echo "<form method='post' onsubmit='return confirmDelete()'>
                <p>Are you sure you want to delete this article?</p>
                <input type='submit' name='confirm_delete' value='Yes'>
                <a href='News Article.php'>No, Go Back</a>
              </form>";
    }
} else {
    echo "ArticleID is not set.";
}

$connection->close();
?>
