<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Log Form</title>
</head>
<style>
    .button{
        border: 5px solid ;
        background-color: green;
    }
</style>
<body bgcolor="lightgray">
<nav>
    <li style="display: inline; margin-right: 10px;"><a href="./Digest Configuration.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Digest Configuration</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Reading History.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Reading History</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./News Article.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">News Article</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Notification Log.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Notification Log</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./User Profile.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">User Profile</a></li>
</nav>
<h1>Notification Log Form</h1>
<form method="post">
    <label for="LogID">Log ID:</label>
    <input type="number" id="LogID" name="LogID" required><br><br>

    <label for="UserID">User ID:</label>
    <input type="number" id="UserID" name="UserID" required><br><br>

    <label for="NotificationType">Notification Type:</label>
    <input type="text" id="NotificationType" name="NotificationType" required><br><br>

    <label for="Timestamp">Timestamp:</label>
    <input type="text" id="Timestamp" name="Timestamp" required><br><br>

    <label for="Status">Status:</label>
    <input type="text" id="Status" name="Status" required><br><br>
    <input type="submit" name="insert" value="INSERT" onclick="return confirmInsert()"><br><br>
    <a class="button" href='home.php'>Back to home</a>
</form><br><br>

<table border="1">
    <tr>
        <th>LogID</th>
        <th>UserID</th>
        <th>NotificationType</th>
        <th>Timestamp</th>
        <th>Status</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

    <?php
    // Connection details
    include 'database.php';

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $LogID = $_POST['LogID'];
        $UserID = $_POST['UserID'];
        $NotificationType = $_POST['NotificationType'];
        $Timestamp = $_POST['Timestamp'];
        $Status = $_POST['Status'];

        $stmt = $connection->prepare("INSERT INTO notificationlog (LogID, UserID, NotificationType, Timestamp, Status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $LogID, $UserID, $NotificationType, $Timestamp, $Status);

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='home.php'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }

    // Fetching data from the notification_logs table
    $sql = "SELECT * FROM notificationlog";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["LogID"] . "</td>
                <td>" . $row["UserID"] . "</td>
                <td>" . $row["NotificationType"] . "</td>
                <td>" . $row["Timestamp"] . "</td>
                <td>" . $row["Status"] . "</td>
                <td><a style='padding:4px' href='delete_log.php?LogID=" . $row["LogID"] . "'>Delete</a></td>
                <td><a style='padding:4px' href='update_log.php?LogID=" . $row["LogID"] . "'>Update</a></td>
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
        return confirm("Are you sure you want to Insert this record?");
    }
</script>
</body>
</html>
