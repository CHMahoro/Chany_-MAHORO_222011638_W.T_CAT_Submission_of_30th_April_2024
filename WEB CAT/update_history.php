<?php
// Connection details
include 'database.php';

// Check if HistoryID is set
if (isset($_REQUEST['HistoryID'])) {
    $HistoryID = $_REQUEST['HistoryID'];

    // Retrieve history details for the selected history ID
    $stmt = $connection->prepare("SELECT * FROM readinghistory WHERE HistoryID=?");
    $stmt->bind_param("i", $HistoryID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $UserID = $row['UserID'];
        $ArticleID = $row['ArticleID'];
        $Timestamp = $row['Timestamp'];
        $ReadingDuration = $row['ReadingDuration'];
    } else {
        echo "Reading history not found.";
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
    <title>Reading History Update</title>
    <style>
        /* Include your CSS styles here */
    </style>
</head>
<body>
<header>
    <!-- Header content -->
</header>
<section>
    <h1><u>Reading History Update Form</u></h1>
    <form method="post" onsubmit="return confirmUpdate()">
        <label for="UserID">User ID:</label>
        <input type="number" id="UserID" name="UserID" value="<?php echo isset($UserID) ? $UserID : ''; ?>" required><br><br>
        <label for="ArticleID">Article ID:</label>
        <input type="number" id="ArticleID" name="ArticleID" value="<?php echo isset($ArticleID) ? $ArticleID : ''; ?>" required><br><br>
        <label for="Timestamp">Timestamp:</label>
        <input type="text" id="Timestamp" name="Timestamp" value="<?php echo isset($Timestamp) ? $Timestamp : ''; ?>" required><br><br>
        <label for="ReadingDuration">Reading Duration:</label>
        <input type="number" id="ReadingDuration" name="ReadingDuration" value="<?php echo isset($ReadingDuration) ? $ReadingDuration : ''; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    // Handle update operation
    if (isset($_POST['update'])) {
        // Retrieve updated values from the form
        $UserID = $_POST['UserID'];
        $ArticleID = $_POST['ArticleID'];
        $Timestamp = $_POST['Timestamp'];
        $ReadingDuration = $_POST['ReadingDuration'];

        // Update the reading history in the database
        $stmt = $connection->prepare("UPDATE readinghistory SET UserID=?, ArticleID=?, Timestamp=?, ReadingDuration=? WHERE HistoryID=?");
        $stmt->bind_param("iissi", $UserID, $ArticleID, $Timestamp, $ReadingDuration, $HistoryID);
        if ($stmt->execute()) {
            echo "Reading history updated successfully.";
            // Redirect to the reading history page
            echo '<script>window.location.href = "Reading History.php";</script>';
        } else {
            echo "Error updating reading history: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    <!-- Additional content or table of reading histories can be added here -->
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
