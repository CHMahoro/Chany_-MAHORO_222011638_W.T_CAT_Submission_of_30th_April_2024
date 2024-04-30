<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

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
        p {
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
  <form method="GET" class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

</header>
    </div>
<div id="contact-us">
    <h1>Contact us</h1>
    <p><strong>Names:</strong> Personalized Daily News Digest</p>
    <p><strong>Phone Number:</strong> +250789249408</p>
    <p><strong>PO Box:</strong> 1234</p>
    <p><strong>Email:</strong> newsdigest@gmail.com</p>
    <p><strong>Facebook:</strong> PersonalizedDailyNewsDigest</p>
    <p><strong>Twitter:</strong> @DailyDigest</p>
</div>

<!-- Additional platforms -->
<div class="platform">
    <a href="https://www.linkedin.com/in/personalized-daily-news-digest">LinkedIn</a>
    <a href="https://www.instagram.com/personalized_daily_news">Instagram</a>
    <a href="https://www.youtube.com/channel/UCRP4Jpze0hKUy5kVNCr5RMw">YouTube</a>
    <a href="https://www.pinterest.com/personalizeddailynews">Pinterest</a>
    <a href="https://www.tiktok.com/@dailynewsdigest">TikTok</a>
    <a href="https://reddit.com/user/personalizeddailynews">Reddit</a>
    <a href="https://www.snapchat.com/add/dailynewsdigest">Snapchat</a>
    <a href="https://www.twitch.tv/personalizeddailynews">Twitch</a>
    <a href="https://discord.gg/personalizeddailynews">Discord</a>
    <a href="https://www.whatsapp.com/personalizeddailynews">WhatsApp</a>
</div>

</body>
</html>

