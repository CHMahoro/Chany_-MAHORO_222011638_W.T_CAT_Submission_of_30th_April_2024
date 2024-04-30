<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digest Configuration Form</title>
</head>
<body>
    <?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Include database connection details
    include 'database.php';

    // Check if digestID is set
    if (isset($_REQUEST['DigestID'])) {
        $DigestID = $_REQUEST['DigestID'];

        // Use prepared statement to fetch data
        $stmt = $connection->prepare("SELECT * FROM digestconfiguration WHERE DigestID = ?");
        $stmt->bind_param("i", $DigestID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $UserID = $row['UserID'];
            $TimeOfDelivery = $row['TimeOfDelivery'];
            $PreferredContentTypes = $row['PreferredContentTypes'];
            $LanguagePreferences = $row['LanguagePreferences'];
        } else {
            echo "Digest configuration not found.";
        }

        // Close statement
        $stmt->close();
    }
    ?>

    <form id="updateForm" method="POST" onsubmit="return confirmUpdate()">
        <label for="UserID">User ID:</label>
        <input type="text" name="UserID" value="<?php echo isset($UserID) ? htmlspecialchars($UserID, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="TimeOfDelivery">Time of Delivery:</label>
        <input type="text" name="TimeOfDelivery" value="<?php echo isset($TimeOfDelivery) ? htmlspecialchars($TimeOfDelivery, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="PreferredContentTypes">Preferred Content Types:</label>
        <input type="text" name="PreferredContentTypes" value="<?php echo isset($PreferredContentTypes) ? htmlspecialchars($PreferredContentTypes, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="LanguagePreferences">Language Preferences:</label>
        <input type="text" name="LanguagePreferences" value="<?php echo isset($LanguagePreferences) ? htmlspecialchars($LanguagePreferences, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <!-- Add a hidden field to hold DigestID -->
        <input type="hidden" name="DigestID" value="<?php echo isset($DigestID) ? htmlspecialchars($DigestID, ENT_QUOTES) : ''; ?>">

        <input type="submit" name="update" value="Update">
    </form>

    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this data?");
        }
    </script>

    <?php
    // Handle form submission
    if (isset($_POST['update'])) {
        // Retrieve DigestID from the form
        $DigestID = htmlspecialchars($_POST['DigestID'], ENT_QUOTES);

        // Retrieve updated values from the form
        $UserID = htmlspecialchars($_POST['UserID'], ENT_QUOTES);
        $TimeOfDelivery = htmlspecialchars($_POST['TimeOfDelivery'], ENT_QUOTES);
        $PreferredContentTypes = htmlspecialchars($_POST['PreferredContentTypes'], ENT_QUOTES);
        $LanguagePreferences = htmlspecialchars($_POST['LanguagePreferences'], ENT_QUOTES);

        // Use prepared statement for update
        $stmt = $connection->prepare("UPDATE digestconfiguration SET UserID = ?, TimeOfDelivery = ?, PreferredContentTypes = ?, LanguagePreferences = ? WHERE DigestID = ?");
        $stmt->bind_param("ssssi", $UserID, $TimeOfDelivery, $PreferredContentTypes, $LanguagePreferences, $DigestID);
        
        if ($stmt->execute()) {
            // Redirect to the page after successful update
            header('Location: Digest Configuration.php');
            exit(); // Ensure that no other content is sent after the header redirection
        } else {
            // Handle error
            echo "Failed to update digest configuration. Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $connection->close();
    ?>
</body>
</html>
