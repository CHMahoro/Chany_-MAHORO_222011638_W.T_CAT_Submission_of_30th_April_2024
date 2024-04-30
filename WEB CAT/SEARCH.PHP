<?php
if (isset($_GET['query'])) {
include 'database.php';

    $searchTerm = $connection->real_escape_string($_GET['query']);

    $sql_digestconfiguration = "SELECT * FROM digestconfiguration WHERE UserID LIKE '%$searchTerm%'";
    $result_digestconfiguration = $connection->query($sql_digestconfiguration);

    $sql_newsarticle = "SELECT * FROM newsarticle WHERE ArticleID LIKE '%$searchTerm%'";
    $result_newsarticle = $connection->query($sql_newsarticle);

    $sql_notificationlog = "SELECT * FROM notificationlog WHERE LogID LIKE '%$searchTerm%'";
    $result_notificationlog = $connection->query($sql_notificationlog);

    $sql_readinghistory = "SELECT * FROM readinghistory WHERE HistoryID LIKE '%$searchTerm%'";
    $result_readinghistory = $connection->query($sql_readinghistory);

    $sql_userprofile = "SELECT * FROM userprofile WHERE UserID LIKE '%$searchTerm%'";
    $result_userprofile = $connection->query($sql_userprofile);

    echo "<h2><u>Search Results:</u></h2>";

    echo "<h3>digestconfiguration:</h3>";
    if ($result_digestconfiguration->num_rows > 0) {
        while ($row = $result_digestconfiguration->fetch_assoc()) {
            echo "<p>" . $row['UserID'] . "</p>";
        }
    } else {
        echo "<p>No digest configurations found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>newsarticle:</h3>";
    if ($result_newsarticle->num_rows > 0) {
        while ($row = $result_newsarticle->fetch_assoc()) {
            echo "<p>" . $row['ArticleID'] . "</p>";
        }
    } else {
        echo "<p>No news articles found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>notificationlog:</h3>";
    if ($result_notificationlog->num_rows > 0) {
        while ($row = $result_notificationlog->fetch_assoc()) {
            echo "<p>" . $row['LogID'] . "</p>";
        }
    } else {
        echo "<p>No notifications found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>readinghistory:</h3>";
    if ($result_readinghistory->num_rows > 0) {
        while ($row = $result_readinghistory->fetch_assoc()) {
            echo "<p>" . $row['HistoryID'] . "</p>";
        }
    } else {
        echo "<p>No reading history entries found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>userprofile:</h3>";
    if ($result_userprofile->num_rows > 0) {
        while ($row = $result_userprofile->fetch_assoc()) {
            echo "<p>" . $row['UserID'] . "</p>";
        }
    } else {
        echo "<p>No user profiles found matching the search term: " . $searchTerm . "</p>";
    }

    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
