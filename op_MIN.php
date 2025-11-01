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
            background-color: #154734;
        }

        /* Image Size */
        .title-logo img {
            width: 120px; 
            height: 100px; 
        }
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--====== Table ======-->
    <?php include 'table_originalPicks.php'; ?>

    <title>Minnesota Wild - Original Picks - NHL Original Picks</title>
</head>

<body>
    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>Minnesota Wild</h2>

                <!--====== Contracts and Cap Hit Tracker ======-->
                <?php $teamName = 'Minnesota Wild'; ?>
                <?php include 'contractsOP_caphit.php'; ?>
                
                <div class="team-info">
                    <h4>Original Picks</h4>
                </div>

                <img src="images/logo-wild.png" alt="Title Logo">
            </div>

            <!--====== Average Ratings ======-->
            <?php $teamName = 'Minnesota Wild'; ?>
            <?php include 'averageOP_ratings.php'; ?>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="op_LAK.php" class="w3-button w3-text-black">&#10094; Los Angeles Kings</a>
                <a href="op_MTL.php" class="w3-button w3-right w3-text-black">Montreal Canadiens &#10095;</a>
            </div>

            <!--====== Forwards Table ======-->
            <?php generateOriginalPickTable($pdo, 'Minnesota Wild', 'F', 40, 'Forwards', 6); ?>

            <!--====== Defensemen Table ======-->
            <?php generateOriginalPickTable($pdo, 'Minnesota Wild', 'D', 20, 'Defensemen', 3); ?>

            <!--====== Goalies Table ======-->
            <?php generateOriginalPickTable($pdo, 'Minnesota Wild', 'G', 10, 'Goalies', 1); ?>

        </div>
    </header>

    <!--====== JS ======-->
    <script src="js/navbar.js"></script>
    <script src="js/extras.js"></script>

</body>
</html>
