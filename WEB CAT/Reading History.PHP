<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading History Form</title>
    
    <style>
        .button {
            border: 5px solid;
            background-color: green;
        }
    </style>
    <script>
        function confirmInsert() {
            return confirm("Are you sure you want to Insert this record?");
        }
    </script>
</head>
<body bgcolor="lightgray">
    <nav>
        <ul>
            <li style="display: inline; margin-right: 10px;"><a href="./Digest Configuration.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Digest Configuration</a></li>
            <li style="display: inline; margin-right: 10px;"><a href="./Reading History.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Reading History</a></li>
            <li style="display: inline; margin-right: 10px;"><a href="./News Article.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">News Article</a></li>
            <li style="display: inline; margin-right: 10px;"><a href="./Notification Log.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Notification Log</a></li>
            <li style="display: inline; margin-right: 10px;"><a href="./User Profile.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">User Profile</a></li>
        </ul>
    </nav>
    <h1>Reading History Form</h1>
    <form method="post" onsubmit="return confirmInsert()">
        <label for="HistoryID">History ID:</label>
        <input type="number" id="HistoryID" name="HistoryID" required><br><br>

        <label for="UserID">User ID:</label>
        <input type="number" id="UserID" name="UserID" required><br><br>

        <label for="ArticleID">Article ID:</label>
        <input type="number" id="ArticleID" name="ArticleID" required><br><br>

        <label for="Timestamp">Timestamp:</label>
        <input type="text" id="Timestamp" name="Timestamp" required><br><br>

        <label for="ReadingDuration">Reading Duration:</label>
        <input type="number" id="ReadingDuration" name="ReadingDuration" required><br><br>

        <input type="submit" name="insert" value="INSERT"><br><br>
        <a class="button" href='home.php'>Back to home</a>
    </form><br><br>

    <table border="1">
        <tr>
            <th>History ID</th>
            <th>User ID</th>
            <th>Article ID</th>
            <th>Timestamp</th>
            <th>Reading Duration</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // Connection details
        include 'database.php';
        
        // Check if the form is submitted for insert
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
            // Insert section
            $HistoryID = $_POST['HistoryID'];
            $UserID = $_POST['UserID'];
            $ArticleID = $_POST['ArticleID'];
            $Timestamp = $_POST['Timestamp'];
            $ReadingDuration = $_POST['ReadingDuration'];

            $stmt = $connection->prepare("INSERT INTO readinghistory (HistoryID, UserID, ArticleID, Timestamp, ReadingDuration) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiisi", $HistoryID, $UserID, $ArticleID, $Timestamp, $ReadingDuration);

            if ($stmt->execute()) {
                echo "New record has been added successfully.<br><br>
                     <a href='home.php'>Back to Form</a>";
            } else {
                echo "Error inserting data: " . $stmt->error;
            }

            $stmt->close();
        }

        // Fetching data from the reading_history table
        $sql = "SELECT * FROM readinghistory";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["HistoryID"] . "</td>
                    <td>" . $row["UserID"] . "</td>
                    <td>" . $row["ArticleID"] . "</td>
                    <td>" . $row["Timestamp"] . "</td>
                    <td>" . $row["ReadingDuration"] . "</td>
                    <td><a style='padding:4px' href='delete_history.php?HistoryID=" . $row["HistoryID"] . "'>Delete</a></td>
                    <td><a style='padding:4px' href='update_history.php?HistoryID=" . $row["HistoryID"] . "'>Update</a></td>
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
</body>
</html>
