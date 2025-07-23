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

        /* Table */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            padding: 30px;
            border: 1px solid black; /* Transparent border */
            background-color: white;
        }

        .custom-table th {
            color: #fff; /* Change to your desired text color */
            background-color: #00205B;
        }

        /* Image Size */
        .title-logo img {
            width: 100px; 
            height: 100px; 
        }
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--====== Table ======-->
    <?php include 'table_nhl.php'; ?>

    <title>Toronto Maple Leafs - NHL Rosters - NHL Original Picks</title>
</head>

<body>
    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>Toronto Maple Leafs</h2>

                <!--====== Contracts and Cap Hit Tracker ======-->
                <?php $teamName = 'Toronto Maple Leafs'; ?>
                <?php include 'contracts_caphit.php'; ?>

                <div class="team-info">
                    <h3><strong>Coach:</strong> <i>Craig Berube</i></h3>
                    <h3><strong>General Manager:</strong> <i>Brad Treliving</i></h3>
                 </div>  

                <img src="images/logo-mapleleafs.png" alt="Title Logo">
            </div>

            <!--====== Average Ratings ======-->
            <?php $teamName = 'Toronto Maple Leafs'; ?>
            <?php include 'average_ratings.php'; ?>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="nhl_TBL.php" class="w3-button w3-text-black">&#10094; Tampa Bay Lightning</a>
                <a href="nhl_UTA.php" class="w3-button w3-right w3-text-black">Utah Mammoth &#10095;</a>
            </div>

            <!--====== Forwards Table ======-->
            <?php generateTable($pdo, 'Toronto Maple Leafs', 'F', 40, 'Forwards', 6); ?>

            <!--====== Defensemen Table ======-->
            <?php generateTable($pdo, 'Toronto Maple Leafs', 'D', 20, 'Defensemen', 3); ?>

            <!--====== Goalies Table ======-->
            <?php generateTable($pdo, 'Toronto Maple Leafs', 'G', 10, 'Goalies', 1); ?>

        </div>
    </header>

    <!--====== JS ======-->
    <script src="js/navbar.js"></script>
    <script src="js/extras.js"></script>

</body>
</html>
