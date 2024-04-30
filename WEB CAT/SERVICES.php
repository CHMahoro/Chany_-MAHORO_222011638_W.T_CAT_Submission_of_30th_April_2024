<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ABOUT</title>
  <title>PERSONALIZED DAILY NEWS DIGEST</title>
    <div id="image-slider">


  <style>
       body {
            font-family: Arial, sans-serif;
            font-size: 17px;
            color: green;
            background-color: white;
            margin: 0;
            background-image: url('background_image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .header {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            background-color: rgba(255, 192, 203, 0.8);
        }
        .nav {
            overflow: hidden;
            background-color: rgba(105, 105, 105, 0.8);
        }
        .nav a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 18px;
        }
        .nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px;
            border-radius: 10px;
        }
        h1, h2, h3 {
            color: green;
        }
        li {
            color: blue;
            font-size: 18px;
        }
       #image-slider {
    height: 300px; /* Adjust height as needed */
    animation: slideImages 15s infinite;
}

@keyframes slideImages {
    0%, 33.33% {
        background-image: url('sky4.jpg');
    }
    33.33%, 66.66% {
        background-image: url('sky 3.jpg');
    }
    66.66%, 100% {
        background-image: url('sky 2.jpg');
    }
}

        /* Animation */
        @keyframes move {
            0% { transform: translateY(-50%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .moving-text {
            animation: move 10s infinite alternate;
        }
         #services {
            position: relative;
            animation: moveText 10s linear infinite alternate; /* Adjust timing as needed */
        }

        @keyframes moveText {
            0% {
                right: 0;
            }
            100% {
                right: -200px; /* Adjust distance to move */
            }
  .dropdown {
    position: relative;
    display: inline;
    margin-right: 10px;
  }
  .dropdown-contents {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    left: 0; /* Aligning dropdown contents to the left */
  }
  .dropdown:hover .dropdown-contents {
    display: block;
  }
  .dropdown-contents a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  .dropdown-contents a:hover {
    background-color: #f1f1f1;
  }

section{
    padding:80px;
    border-bottom: 1px solid #ddd;
}
footer{
    text-align: center;
    padding: 15px;
    background-color:white;
}

        
</style>

<header>
</head>
<div class="header">
    <h1>PERSONALIZED DAILY NEWS DIGEST</h1>
</div>
<body style="background-image: url('0.png');">
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;"><a href="./home.html" style="padding: 10px; color: white; background-color: GREEN; text-decoration: none; margin-right: 15px;">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html" style="padding: 10px; color: white; background-color: GREEN; text-decoration: none; margin-right: 15px;">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html" style="padding: 10px; color: white; background-color:GREEN; text-decoration: none; margin-right: 15px;">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./services.html" style="padding: 10px; color: white; background-color: GREEN; text-decoration: none; margin-right: 15px;">SERVICES</a></li>
    
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color:GREEN; text-decoration: none; margin-right: 15px;">MY TABLES</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="Digest Configuration.php">Digest Configuration</a>
        <a href="Reading History.php">Reading History</a>
        <a href="News Article.php">News Article</a>
         <a href="Notification Log.php">Notification Log</a>
          <a href="User Profile.php">User Profile</a>
      </div>
    </li>
    
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color:GREEN; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</header>
<form method="GET" class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

<div id="services">
    <h1>Services</h1>
    <h1>the services we offer</h1>

    <h1>1. Personalized News Summary:</h1>
    <ul>
        <li>The "Personalized Daily News Digest" project generates a daily summary of news articles based on users' interests and reading habits. For example, if a user frequently reads articles about technology and sports, the daily digest will prioritize news in these categories.</li>
    </ul>
    
    <h1>2. User Profile Creation:</h1>
    <ul>
        <li>Users can create personalized profiles where they can specify their preferences, such as favorite topics or preferred sources. For instance, a user can indicate an interest in politics and international news.</li>
    </ul>
    
    <h1>3. Customized Content Curation:</h1>
    <ul>
        <li>Using smart technology, the project analyzes users' reading history and preferences to curate a list of articles tailored to their interests. For example, if a user often reads articles from a particular news outlet, the project will include more articles from that source in their digest.</li>
    </ul>
    
    <h1>4. Scheduled Delivery:</h1>
    <ul>
        <li>The project sends the personalized news digest to users at a specific time each day, making it convenient for them to stay informed without actively searching for news. For example, users can receive their digest every morning before they start their day.</li>
    </ul>
    
    <h1>5. Language and Content Preferences:</h1>
    <ul>
        <li>Users can specify their language preferences and preferred content types (e.g., articles, videos) to further customize their news experience. For instance, a user can choose to receive news articles in English.</li>
    </ul>
    
    <h1>6. Reading History Tracking:</h1>
    <ul>
        <li>The project keeps track of users' reading history, including the articles they've read and the time spent on each article. This data helps improve the personalization of future digests and provides insights into users' interests.</li>
    </ul>
</div>


<footer>
  <center> 
    <b><h2><i>UR CBE BIT &copy, 2024 &reg, prepared by MAHORO Chany</h2></b></i>
  </center>
</footer>


</body>
</html>