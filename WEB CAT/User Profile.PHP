<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Form</title>
</head>
<style>
    .button {
        border: 5px solid;
        background-color: green;
    }
</style>
<body bgcolor="cyan">
<nav>
    <ul>
        <li style="display: inline; margin-right: 10px;"><a href="./Digest Configuration.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Digest Configuration</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./Reading History.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Reading History</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./News Article.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">News Article</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./Notification Log.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Notification Log</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./User Profile.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">User Profile</a></li>
    </ul>
</nav>
<h1>User Update Form</h1>
<form id="updateForm" method="post">
    <label for="UserID">User ID:</label>
    <input type="number" id="UserID" name="UserID" required><br><br>

    <label for="Username">Username:</label>
    <input type="text" id="Username" name="Username" required><br><br>

    <label for="Email">Email:</label>
    <input type="email" id="Email" name="Email" required><br><br>

    <label for="Preferences">Preferences:</label>
    <input type="text" id="Preferences" name="Preferences" required><br><br>

    <label for="ReadingHistory">Reading History:</label>
    <input type="text" id="ReadingHistory" name="ReadingHistory" required><br><br>

    <label for="SubscriptionStatus">Subscription Status:</label>
    <input type="text" id="SubscriptionStatus" name="SubscriptionStatus" required><br><br>

    <input type="submit" name="Insert" value="Insert" onclick="return confirmInsert()"><br><br>
    <a class="button" href='home.php'>Back to home</a>
</form><br><br>
<table border="1">
    <tr>
        <th>UserID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Preferences</th>
        <th>ReadingHistory</th>
        <th>SubscriptionStatus</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

    <?php
    // Connection details
    include 'database.php';

    // Check if the form is submitted for Insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Insert'])) {
        // Insert section
        $UserID = $_POST['UserID'];
        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Preferences = $_POST['Preferences'];
        $ReadingHistory = $_POST['ReadingHistory'];
        $SubscriptionStatus = $_POST['SubscriptionStatus'];

        $stmt = $connection->prepare("INSERT INTO userprofile (UserID, Username, Email, Preferences, ReadingHistory, SubscriptionStatus) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $UserID, $Username, $Email, $Preferences, $ReadingHistory, $SubscriptionStatus);

        if ($stmt->execute()) {
            echo "Record Inserted successfully.<br><br>
                 <a href='home.php'>Back to Form</a>";
        } else {
            echo "Error Inserting record: " . $stmt->error;
        }

        $stmt->close();
    }

    // Fetching data from the user_profile table
    $sql = "SELECT * FROM userprofile";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["UserID"] . "</td>
                <td>" . $row["Username"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Preferences"] . "</td>
                <td>" . $row["ReadingHistory"] . "</td>
                <td>" . $row["SubscriptionStatus"] . "</td>
                <td><a style='padding:4px' href='delete_user.php?UserID=" . $row["UserID"] . "'>Delete</a></td>
                <td><a style='padding:4px' href='update_user.php?UserID=" . $row["UserID"] . "'>Update</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
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
