<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/table.css">
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

        /*! Table Padding */
        .w3-responsive {
            padding: 20px;
        }
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--====== Table ======-->
    <?php include 'nhlTable.php'; ?>

    <title>Pittsburgh Penguins - NHL Rosters - NHL Original Picks</title>
</head>

<body>
    
    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>Pittsburgh Penguins</h2>
                <img src="images/pit_logo.png" alt="Title Logo">
            </div>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="nhl_PHI.php" class="w3-button w3-text-black">&#10094; Previous</a>
                <a href="nhl_SJS.php" class="w3-button w3-right w3-text-black">Next &#10095;</a>
            </div>

            <!--====== Forwards Table ======-->
            <?php generateTable($pdo, 'Pittsburgh Penguins', 'F', 40, 'Forwards', 6); ?>

            <!--====== Defensemen Table ======-->
            <?php generateTable($pdo, 'Pittsburgh Penguins', 'D', 20, 'Defensemen', 3); ?>

            <!--====== Goalies Table ======-->
            <?php generateTable($pdo, 'Pittsburgh Penguins', 'G', 10, 'Goalies', 1); ?>

        </div>
    </header>

    <!--====== JS ======-->
    <script src="js/navbar.js"></script>

</body>
</html>
           