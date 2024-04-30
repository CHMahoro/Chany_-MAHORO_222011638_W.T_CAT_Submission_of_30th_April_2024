<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digest Configuration Form</title>
</head>
<style>
    .button{
        border: 5px solid ;
        background-color: green;
    }
</style>
<body bgcolor="cyan">
    <nav><li style="display: inline; margin-right: 10px;"><a href="./Digest Configuration.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Digest Configuration</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Reading History.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Reading History</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./News Article.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">News Article</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Notification Log.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Notification Log</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./User Profile.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">User Profile</a></li></nav>
    <h1>Digest Configuration Form</h1>
    <form id="insertForm" method="post">
        <label for="DigestID">Digest ID:</label>
        <input type="number" id="DigestID" name="DigestID" required><br><br>

        <label for="UserID">User ID:</label>
        <input type="text" id="UserID" name="UserID" required><br><br>

        <label for="TimeOfDelivery">Time of Delivery:</label>
         <input type="text" id="TimeOfDelivery" name="TimeOfDelivery" required><br><br>

        <label for="PreferredContentTypes">Preferred Content Types:</label>
        <input type="text" id="PreferredContentTypes" name="PreferredContentTypes" required><br><br>

        <label for="LanguagePreferences">Language Preferences:</label>
        <input type="text" id="LanguagePreferences" name="LanguagePreferences" required><br><br>

        <input type="submit" name="insert" value="INSERT" onclick="return confirmInsert()"><br><br>
        <a class="button"  href='home.php'>Back to home</a>
    </form><br><br>
    <table border="1">
        <tr>
            <th>DigestID</th>
            <th>UserID</th>
            <th>TimeOfDelivery</th>
            <th>PreferredContentTypes</th>
            <th>LanguagePreferences</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // Connection details
        include 'database.php';

        // Check if the form is submitted for insert
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
            // Insert section
            $DigestID = $_POST['DigestID'];
            $UserID = $_POST['UserID'];
            $TimeOfDelivery = $_POST['TimeOfDelivery'];
            $PreferredContentTypes = $_POST['PreferredContentTypes'];
            $LanguagePreferences = $_POST['LanguagePreferences'];

            $stmt = $connection->prepare("INSERT INTO digestconfiguration (DigestID, UserID, TimeOfDelivery, PreferredContentTypes, LanguagePreferences) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $DigestID, $UserID, $TimeOfDelivery, $PreferredContentTypes, $LanguagePreferences);

            if ($stmt->execute()) {
                echo "New record has been added successfully.<br><br>
                     <a href='home.php'>Back to Form</a>";
            } else {
                echo "Error inserting data: " . $stmt->error;
            }

            $stmt->close();
        }

        // Fetching data from the digest_configuration table
        $sql = "SELECT * FROM digestconfiguration";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["DigestID"] . "</td>
                    <td>" . $row["UserID"] . "</td>
                    <td>" . $row["TimeOfDelivery"] . "</td>
                    <td>" . $row["PreferredContentTypes"] . "</td>
                    <td>" . $row["LanguagePreferences"] . "</td>
                    <td><a style='padding:4px' href='delete_digest.php?DigestID=" . $row["DigestID"] . "'>Delete</a></td>
                    <td><a style='padding:4px' href='update_digest.php?DigestID=" . $row["DigestID"] . "'>Update</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }

        // Close connection
        $connection->close();
        ?>
    </table>

    <footer>
        <h2>PERSONALIZED DAILY NEWS DIGEST &copy; 2024 &222011638; Designed by: MAHORO Chany</h2>
    </footer>

    <script>
        function confirmInsert() {
            return confirm("Are you sure you want to insert this data?");
        }
    </script>
</body>
</html>
 