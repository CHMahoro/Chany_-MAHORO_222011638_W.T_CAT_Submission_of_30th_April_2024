<?php
// Connection details
include 'database.php';

// Check if article_id is set
if (isset($_REQUEST['ArticleID'])) {
    $ArticleID = $_REQUEST['ArticleID'];

    // Retrieve article details for the selected article
    $stmt = $connection->prepare("SELECT * FROM newsarticle WHERE ArticleID=?");
    $stmt->bind_param("i", $ArticleID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Title = $row['Title'];
        $Author = $row['Author'];
        $PublicationDate = $row['PublicationDate'];
        $Content = $row['Content'];
        $Tags = $row['Tags'];
        $Source = $row['Source'];
    } else {
        echo "Article not found.";
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
    <title>Edit News Article</title>
    <style>
        /* Include your CSS styles here */
    </style>
</head>
<body>
<header>
    <!-- Header content -->
</header>
<section>
    <h1>Edit News Article</h1>
    <form method="post" onsubmit="return confirmUpdate()">
        <label for="Title">Title:</label>
        <input type="text" id="Title" name="Title" value="<?php echo isset($Title) ? htmlspecialchars($Title, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Author">Author:</label>
        <input type="text" id="Author" name="Author" value="<?php echo isset($Author) ? htmlspecialchars($Author, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="PublicationDate">Publication Date:</label>
        <input type="text" id="PublicationDate" name="PublicationDate" value="<?php echo isset($PublicationDate) ? htmlspecialchars($PublicationDate, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Content">Content:</label>
        <textarea id="Content" name="Content" required><?php echo isset($Content) ? htmlspecialchars($Content, ENT_QUOTES) : ''; ?></textarea><br><br>
        <label for="Tags">Tags:</label>
        <input type="text" id="Tags" name="Tags" value="<?php echo isset($Tags) ? htmlspecialchars($Tags, ENT_QUOTES) : ''; ?>" required><br><br>
        <label for="Source">Source:</label>
        <input type="text" id="Source" name="Source" value="<?php echo isset($Source) ? htmlspecialchars($Source, ENT_QUOTES) : ''; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    // Handle update operation
    if (isset($_POST['update'])) {
        // Retrieve updated values from the form
        $Title = htmlspecialchars($_POST['Title'], ENT_QUOTES);
        $Author = htmlspecialchars($_POST['Author'], ENT_QUOTES);
        $PublicationDate = htmlspecialchars($_POST['PublicationDate'], ENT_QUOTES);
        $Content = htmlspecialchars($_POST['Content'], ENT_QUOTES);
        $Tags = htmlspecialchars($_POST['Tags'], ENT_QUOTES);
        $Source = htmlspecialchars($_POST['Source'], ENT_QUOTES);

        // Update the news article in the database
        $stmt = $connection->prepare("UPDATE newsarticle SET Title=?, Author=?, PublicationDate=?, Content=?, Tags=?, Source=? WHERE ArticleID=?");
        $stmt->bind_param("ssssssi", $Title, $Author, $PublicationDate, $Content, $Tags, $Source, $ArticleID);
        if ($stmt->execute()) {
            echo "News article updated successfully.";
            // Redirect to News Article.php
            echo '<script>window.location.href = "News Article.php";</script>';
        } else {
            echo "Error updating news article: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    <!-- Additional content or table of news articles can be added here -->
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
