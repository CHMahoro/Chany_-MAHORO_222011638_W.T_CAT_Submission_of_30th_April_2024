<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article Form</title>
</head>
<style>
    .button {
        border: 5px solid;
        background-color: green;
    }
</style>
<body bgcolor="lightgray">
<nav>
    <ul>
        <li style="display: inline; margin-right: 10px;"><a href="./Digest Configuration.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Digest Configuration</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./Reading History.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Reading History</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./News Article.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">News Article</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./Notification Log.php" style="padding: 10px; color: white; background-color: green; text-decoration: none; margin-right: 15px;">Notification Log</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./User Profile.php" style="padding: 10px; color: white; background-color:green; text-decoration: none; margin-right: 15px;">User Profile</a></li>
    </ul>
</nav>
<h1>News Article Form</h1>
<form method="post" onsubmit="return confirmInsert()">
    <label for="ArticleID">Article ID:</label>
    <input type="number" id="ArticleID" name="ArticleID" required><br><br>

    <label for="Title">Title:</label>
    <input type="text" id="Title" name="Title" required><br><br>

    <label for="Author">Author:</label>
    <input type="text" id="Author" name="Author" required><br><br>

    <label for="PublicationDate">Publication Date:</label>
    <input type="text" id="PublicationDate" name="PublicationDate" required><br><br>

    <label for="Content">Content:</label>
    <input type="text" id="Content" name="Content" required><br><br>

    <label for="Tags">Tags:</label>
    <input type="text" id="Tags" name="Tags" required><br><br>

    <label for="Source">Source:</label>
    <input type="text" id="Source" name="Source" required><br><br>

    <input type="submit" name="insert" value="INSERT"><br><br>
    <a class="button" href='home.php'>Back to home</a>
</form><br><br>

<table border="1">
    <tr>
        <th>ArticleID</th>
        <th>Title</th>
        <th>Author</th>
        <th>PublicationDate</th>
        <th>Content</th>
        <th>Tags</th>
        <th>Source</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

    <?php
    // Connection details
    include 'database.php';

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $ArticleID = $_POST['ArticleID'];
        $Title = $_POST['Title'];
        $Author = $_POST['Author'];
        $PublicationDate = $_POST['PublicationDate'];
        $Content = $_POST['Content'];
        $Tags = $_POST['Tags'];
        $Source = $_POST['Source'];

        $stmt = $connection->prepare("INSERT INTO Newsarticle (ArticleID, Title, Author, PublicationDate, Content, Tags, Source) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $ArticleID, $Title, $Author, $PublicationDate, $Content, $Tags, $Source);

          if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='home.php'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }
    // Fetching data from the news_articles table
    $sql = "SELECT * FROM newsarticle";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["ArticleID"] . "</td>
                <td>" . $row["Title"] . "</td>
                <td>" . $row["Author"] . "</td>
                <td>" . $row["PublicationDate"] . "</td>
                <td>" . $row["Content"] . "</td>
                <td>" . $row["Tags"] . "</td>
                <td>" . $row["Source"] . "</td>
                <td><a style='padding:4px' href='delete_article.php?ArticleID=" . $row["ArticleID"] . "'>Delete</a></td>
                <td><a style='padding:4px' href='update_article.php?ArticleID=" . $row["ArticleID"] . "'>Update</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
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
