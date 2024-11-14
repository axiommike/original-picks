<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        /*! Background Image */
        .banner {
            width: 100%;
            min-height: 100vh;
            background-image: url("images/ice.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--====== Page Title ======-->
    <title>Home - NHL Original Picks</title>
</head>

<body>
  <!--====== Background Image ======-->
  <header class="banner">
    <!--====== Navbar ======-->
    <?php include 'navbar.php'; ?>
    
    <!--====== Main Content ======-->
    <main class="content">
      <h1>ORIGINAL PICKS</h1>
      <p>NHL 25 Players and Rosters<br>Originally Drafted Teams<br>Affiliated Teams Throughout History</p>
      <div class="button-container">
        <button type="button"><span></span><a href="https://www.ea.com/games/nhl/nhl-25" target="_blank">NHL 25</a></button>
        <button type="button"><span></span><a href="https://www.youtube.com/@originalpicks/videos" target="_blank">YOUTUBE</a></button>
      </div>
    </main>
  </header>
  
  <!--====== JS ======-->
  <script src="js/navbar.js"></script>
</body>
</html>
