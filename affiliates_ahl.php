<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/affiliates.css">
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
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--====== Table ======-->
    <?php include 'table_affiliates.php'; ?>

    <title>AHL Affiliations - Affiliations - NHL Original Picks</title>
</head>

<body>
    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>AHL Affiliates</h2>
                <img src="images/ahl.png" alt="Title Logo">
            </div>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="affiliates_echl.php" class="w3-button w3-right w3-text-black">ECHL &#10095;</a>
            </div>

            <!--====== Forwards Table ======-->
            <?php generateTable($pdo, 'AHL', ''); ?>

        </div>
    </header>

    <!--====== JS ======-->
    <script src="js/navbar.js"></script>

</body>
</html>