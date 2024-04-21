<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/database.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Background Image */
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

    <!--====== Table ======-->
    <?php include 'table_nhlDatabase.php'; ?>

    <title>NHL Player Database - Players Database - NHL Original Picks</title>
</head>

<body>

    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3">
            <div class="title-logo">
                <h2>NHL PLAYER DATABASE</h2>
                <img src="images/nhl.png" alt="Title Logo">
            </div>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="database_pwhl.php" class="w3-button w3-right w3-text-black">PWHL Database &#10095;</a>
            </div>

            <!--====== Database Table ======-->
            <?php generateTable($pdo, ''); ?>
            
        </div>
    </header>
            <!--====== JS ======-->
            <script src="js/navbar.js"></script>
        
    </div>
</body>
</html>