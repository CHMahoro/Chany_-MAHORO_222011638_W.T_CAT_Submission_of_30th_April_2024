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

</header>
<form method="GET" class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

<div class="container">
    <div id="about">

        <h1>Welcome to the Personalized Daily News Digest!</h1>
        <p class="moving-text">At Personalized Daily News Digest, we understand the challenges of keeping up with the ever-changing world of news. That's why we've created a unique platform that simplifies the process and delivers news tailored just for you.</p>

        <h2>Stay Informed, Effortlessly:</h2>
        <p class="moving-text">Say goodbye to information overload and endless scrolling through news feeds. Our project offers a hassle-free solution to staying informed. We analyze your reading preferences, habits, and past engagements to curate a personalized daily summary of news articles that match your interests.</p>

        <h2>Your News, Your Way:</h2>
        <p class="moving-text">No more sifting through irrelevant headlines. Our smart technology ensures that you receive a concise selection of articles that resonate with your interests. Whether it's politics, technology, sports, or entertainment – we've got you covered.</p>

        <h2>Connect with What Matters:</h2>
        <p class="moving-text">We believe in fostering a deeper connection between you and the news. By delivering content that aligns with your interests, our project aims to make your news reading experience more engaging and enjoyable.</p>

        <h2>Confidence in Current Affairs:</h2>
        <p class="moving-text">Stay up-to-date and informed about the events shaping the world around you. With our personalized news updates, you'll feel confident and knowledgeable about what's happening, without the overwhelm of information overload.</p>

        <h2>Experience the Future of News:</h2>
        <p class="moving-text">Join us on a journey where technology meets personalized news delivery. Our project is designed to make the news more accessible, understandable, and enjoyable for you. It's news on your terms, delivered when you want it, in a way that suits your preferences.</p>

        <h2>Start Your Personalized News Experience Today:</h2>
        <p class="moving-text">Sign up now to experience the future of news delivery. Get your personalized daily news digest delivered straight to your inbox, and stay informed with ease.</p>
    </div>

    <h3>Contact Details</h3>
    <p><strong>Name:</strong> MAHORO Chany </p>
    <p><strong>Phone Number:</strong> +250789249459</p>
    <p><strong>PO Box:</strong> 808</p>
    <p><strong>Email:</strong> chanymahoro56@gmail.com</p>
</div>

<footer>
  <center> 
    <b><h2><i>UR CBE BIT &copy, 2024 &reg:222011638, prepared by MAHORO Chany</h2></b></i>
  </center>
</footer>


</body>
</html>