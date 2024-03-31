<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/searchbar.css">

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /*!======== Background Image ========*/
        .banner {
            width: 100%;
            min-height: 100vh;
            background-image: url("images/ice.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .w3-responsive {
            padding: 20px;
        }

        .fa-check {
            color: green;
        }
        
        .fa-times {
            color: red;
        }
    </style>

    <title>AHL Teams - Affiliation History - NHL Original Picks</title>
</head>

<body>
    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>AHL</h2>
                <img src="images/ahl_logo.png" alt="Title Logo">
            </div>

            <!--====== Table Search Bar ======-->
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search teams...">

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="echl.php" class="w3-button w3-right w3-text-black">Next &#10095;</a>
            </div>

            <?php 
            $league = "AHL";
            include 'affiliationTable.php'; 
            ?>

        </div>
    </header>

    <!--====== JS ======-->
    <script src="js/searchFunction.js"></script>
    <script src="js/navbar.js"></script>
    
</body>
</html>