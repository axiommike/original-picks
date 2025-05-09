<?php
// Get the current page URL or identifier
$page = basename($_SERVER['PHP_SELF'], ".php");

// Set a class for the navbar based on the page
$navbarClass = '';
switch ($page) {
    case 'nhl_ANA':
    case 'nhl_BOS':
    case 'nhl_BUF':
    case 'nhl_CAR':
    case 'nhl_CBJ':
    case 'nhl_CGY':
    case 'nhl_CHI':
    case 'nhl_COL':
    case 'nhl_DAL':
    case 'nhl_DET':
    case 'nhl_EDM':
    case 'nhl_FLA':
    case 'nhl_LAK':
    case 'nhl_MIN':
    case 'nhl_MTL':
    case 'nhl_NJD':
    case 'nhl_NSH':
    case 'nhl_NYI':
    case 'nhl_NYR':
    case 'nhl_OTT':
    case 'nhl_PHI':
    case 'nhl_PIT':
    case 'nhl_SEA':
    case 'nhl_SJS':
    case 'nhl_STL':
    case 'nhl_TBL':
    case 'nhl_TOR':
    case 'nhl_UTH':
    case 'nhl_VAN':
    case 'nhl_VGK':
    case 'nhl_WPG':
    case 'nhl_WSH':
    case 'op_ANA':
    case 'op_ARI' :
    case 'op_BOS':
    case 'op_BUF':
    case 'op_CAR':
    case 'op_CBJ':
    case 'op_CGY':
    case 'op_CHI':
    case 'op_COL':
    case 'op_DAL':
    case 'op_DET':
    case 'op_EDM':
    case 'op_FLA':
    case 'op_LAK':
    case 'op_MIN':
    case 'op_MTL':
    case 'op_NJD':
    case 'op_NSH':
    case 'op_NYI':
    case 'op_NYR':
    case 'op_OTT':
    case 'op_PHI':
    case 'op_PIT':
    case 'op_SEA':
    case 'op_SJS':
    case 'op_STL':
    case 'op_TBL':
    case 'op_TOR':
    case 'op_UTH':
    case 'op_VAN':
    case 'op_VGK':
    case 'op_WPG':
    case 'op_WSH':
    case 'pwhl_BOS':
    case 'pwhl_MIN':
    case 'pwhl_MTL':
    case 'pwhl_NYS':
    case 'pwhl_OTT':
    case 'pwhl_TOR':
    case 'database_nhl':
    case 'database_pwhl':
    case 'database_fa':

        $navbarClass = $page;
        break;
    default:
        $navbarClass = '';
        break;
}
?>

<div class="navbar <?php echo $navbarClass; ?>" id="myNavbar">

    <!--====== OP Logo ======-->
    <a href="-opTracker.php" class="logo-link">
        <div class="logo <?php echo $navbarClass; ?>">
            <img src="images/logo-originalPicks.png" alt="Logo">
        </div>
    </a>

    <!--====== Nav Bar NHL Rosters ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">NHL Rosters</button>
        <div class="dropdown-content nhl">
            <a href="nhl_ANA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-ducks.png" alt="Anaheim Ducks Logo">Anaheim Ducks</a>
            <a href="nhl_BOS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-bruins.png" alt="Boston Bruins Logo">Boston Bruins</a>
            <a href="nhl_BUF.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sabres.png" alt="Buffalo Sabres Logo">Buffalo Sabres</a>
            <a href="nhl_CGY.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-flames.png" alt="Calgary Flames Logo">Calgary Flames</a>
            <a href="nhl_CAR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-hurricanes.png" alt="Carolina Hurricanes Logo">Carolina Hurricanes</a>
            <a href="nhl_CHI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-blackhawks.png" alt="Chicago Blackhawks Logo">Chicago Blackhawks</a>
            <a href="nhl_COL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-avalanche.png" alt="Colorado Avalanche Logo">Colorado Avalanche</a>
            <a href="nhl_CBJ.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-bluejackets.png" alt="Columbus Blue Jackets Logo">Columbus Blue Jackets</a>
            <a href="nhl_DAL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-stars.png" alt="Dallas Stars Logo">Dallas Stars</a>
            <a href="nhl_DET.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-redwings.png" alt="Detroit Red Wings Logo">Detroit Red Wings</a>
            <a href="nhl_EDM.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-oilers.png" alt="Edmonton Oilers Logo">Edmonton Oilers</a>
            <a href="nhl_FLA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-panthers.png" alt="Florida Panthers Logo">Florida Panthers</a>
            <a href="nhl_LAK.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-kings.png" alt="Los Angeles Kings Logo">Los Angeles Kings</a>
            <a href="nhl_MIN.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-wild.png" alt="Minnesota Wild Logo">Minnesota Wild</a>
            <a href="nhl_MTL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-canadiens.png" alt="Montreal Canadiens Logo">Montreal Canadiens</a>
            <a href="nhl_NSH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-predators.png" alt="Nashville Predators Logo">Nashville Predators</a>
            <a href="nhl_NJD.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-devils.png" alt="New Jersey Devils Logo">New Jersey Devils</a>
            <a href="nhl_NYI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-islanders.png" alt="New York Islanders Logo">New York Islanders</a>
            <a href="nhl_NYR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-rangers.png" alt="New York Rangers Logo">New York Rangers</a>
            <a href="nhl_OTT.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-senators.png" alt="Ottawa Senators Logo">Ottawa Senators</a>
            <a href="nhl_PHI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-flyers.png" alt="Philadelphia Flyers Logo">Philadelphia Flyers</a>
            <a href="nhl_PIT.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-penguins.png" alt="Pittsburgh Penguins Logo">Pittsburgh Penguins</a>
            <a href="nhl_SJS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sharks.png" alt="San Jose Sharks Logo">San Jose Sharks</a>
            <a href="nhl_SEA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-kraken.png" alt="Seattle Kraken Logo">Seattle Kraken</a>
            <a href="nhl_STL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-blues.png" alt="St. Louis Blues Logo">St. Louis Blues</a>
            <a href="nhl_TBL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-lightning.png" alt="Tampa Bay Lightning Logo">Tampa Bay Lightning</a>
            <a href="nhl_TOR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-mapleleafs.png" alt="Toronto Maple Leafs Logo">Toronto Maple Leafs</a>
            <a href="nhl_UTH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-mammoth.png" alt="Utah Mammoth Logo">Utah Mammoth</a>
            <a href="nhl_VAN.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-canucks.png" alt="Vancouver Canucks Logo">Vancouver Canucks</a>
            <a href="nhl_VGK.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-goldenknights.png" alt="Vegas Golden Knights Logo">Vegas Golden Knights</a>
            <a href="nhl_WSH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-capitals.png" alt="Washington Capitals Logo">Washington Capitals</a>
            <a href="nhl_WPG.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-jets.png" alt="Winnipeg Jets Logo">Winnipeg Jets</a>
        </div>
    </div> 

    <!--====== Nav Bar OP Rosters ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">Original Picks</button>
        <div class="dropdown-content op">
            <a href="op_ANA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-ducks.png" alt="Anaheim Ducks Logo">Anaheim Ducks</a>
            <a href="op_ARI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-coyotes.png" alt="Arizona Coyotes Logo">Arizona Coyotes</a>
            <a href="op_BOS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-bruins.png" alt="Boston Bruins Logo">Boston Bruins</a>
            <a href="op_BUF.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sabres.png" alt="Buffalo Sabres Logo">Buffalo Sabres</a>
            <a href="op_CGY.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-flames.png" alt="Calgary Flames Logo">Calgary Flames</a>
            <a href="op_CAR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-hurricanes.png" alt="Carolina Hurricanes Logo">Carolina Hurricanes</a>
            <a href="op_CHI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-blackhawks.png" alt="Chicago Blackhawks Logo">Chicago Blackhawks</a>
            <a href="op_COL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-avalanche.png" alt="Colorado Avalanche Logo">Colorado Avalanche</a>
            <a href="op_CBJ.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-bluejackets.png" alt="Columbus Blue Jackets Logo">Columbus Blue Jackets</a>
            <a href="op_DAL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-stars.png" alt="Dallas Stars Logo">Dallas Stars</a>
            <a href="op_DET.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-redwings.png" alt="Detroit Red Wings Logo">Detroit Red Wings</a>
            <a href="op_EDM.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-oilers.png" alt="Edmonton Oilers Logo">Edmonton Oilers</a>
            <a href="op_FLA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-panthers.png" alt="Florida Panthers Logo">Florida Panthers</a>
            <a href="op_LAK.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-kings.png" alt="Los Angeles Kings Logo">Los Angeles Kings</a>
            <a href="op_MIN.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-wild.png" alt="Minnesota Wild Logo">Minnesota Wild</a>
            <a href="op_MTL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-canadiens.png" alt="Montreal Canadiens Logo">Montreal Canadiens</a>
            <a href="op_NSH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-predators.png" alt="Nashville Predators Logo">Nashville Predators</a>
            <a href="op_NJD.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-devils.png" alt="New Jersey Devils Logo">New Jersey Devils</a>
            <a href="op_NYI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-islanders.png" alt="New York Islanders Logo">New York Islanders</a>
            <a href="op_NYR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-rangers.png" alt="New York Rangers Logo">New York Rangers</a>
            <a href="op_OTT.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-senators.png" alt="Ottawa Senators Logo">Ottawa Senators</a>
            <a href="op_PHI.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-flyers.png" alt="Philadelphia Flyers Logo">Philadelphia Flyers</a>
            <a href="op_PIT.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-penguins.png" alt="Pittsburgh Penguins Logo">Pittsburgh Penguins</a>
            <a href="op_SJS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sharks.png" alt="San Jose Sharks Logo">San Jose Sharks</a>
            <a href="op_SEA.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-kraken.png" alt="Seattle Kraken Logo">Seattle Kraken</a>
            <a href="op_STL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-blues.png" alt="St. Louis Blues Logo">St. Louis Blues</a>
            <a href="op_TBL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-lightning.png" alt="Tampa Bay Lightning Logo">Tampa Bay Lightning</a>
            <a href="op_TOR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-mapleleafs.png" alt="Toronto Maple Leafs Logo">Toronto Maple Leafs</a>
            <a href="op_UTH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-mammoth.png" alt="Utah Mammoth Logo">Utah Mammoth</a>
            <a href="op_VAN.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-canucks.png" alt="Vancouver Canucks Logo">Vancouver Canucks</a>
            <a href="op_VGK.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-goldenknights.png" alt="Vegas Golden Knights Logo">Vegas Golden Knights</a>
            <a href="op_WSH.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-capitals.png" alt="Washington Capitals Logo">Washington Capitals</a>
            <a href="op_WPG.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-jets.png" alt="Winnipeg Jets Logo">Winnipeg Jets</a>
        </div>
    </div> 

    <!--====== Nav Bar PWHL Rosters ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">PWHL Rosters</button>
        <div class="dropdown-content pwhl">
            <a href="pwhl_BOS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-fleet.png" alt="Boston Fleet Logo">Boston Fleet</a>
            <a href="pwhl_MIN.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-frost.png" alt="Minnesota Frost Logo">Minnesota Frost</a>
            <a href="pwhl_MTL.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-victoire.png" alt="Montreal Victoire Logo">Montreal Victoire</a>
            <a href="pwhl_NYS.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sirens.png" alt="New York Sirens Logo">New York Sirens</a>
            <a href="pwhl_OTT.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-charge.png" alt="Ottawa Charge Logo">Ottawa Charge</a>
            <a href="pwhl_TOR.php" class="dropdown-link"><img class="dropdown-img" src="images/logo-sceptres.png" alt="Toronto Sceptres Logo">Toronto Sceptres</a>
        </div>
    </div>   

    <!--====== Nav Bar Players ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">Players</button>
        <div class="dropdown-content players">
            <a href="database_nhl.php" class="dropdown-link"><img class="dropdown-img" src="images/nhl.png" alt="Player Database Logo">NHL Database</a>
            <a href="database_pwhl.php" class="dropdown-link"><img class="dropdown-img" src="images/pwhl.png" alt="PWHL Database Logo">PWHL Database</a>
            <a href="database_fa.php" class="dropdown-link"><img class="dropdown-img" src="images/nhl.png" alt="NHL Free Agents Logo">NHL Free Agents</a>
        </div>
    </div> 

    <!--====== Nav Bar Draft Class ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">Draft</button>
        <div class="dropdown-content draft">
            <a href="draft_2003.php" class="dropdown-link"><img class="dropdown-img" src="images/2003.png" alt="Draft Logo">2003 NHL Draft</a>
            <a href="draft_2004.php" class="dropdown-link"><img class="dropdown-img" src="images/2004.png" alt="Draft Logo">2004 NHL Draft</a>
            <a href="draft_2005.php" class="dropdown-link"><img class="dropdown-img" src="images/2005.png" alt="Draft Logo">2005 NHL Draft</a>
            <a href="draft_2006.php" class="dropdown-link"><img class="dropdown-img" src="images/2006.png" alt="Draft Logo">2006 NHL Draft</a>
            <a href="draft_2007.php" class="dropdown-link"><img class="dropdown-img" src="images/2007.png" alt="Draft Logo">2007 NHL Draft</a>
            <a href="draft_2008.php" class="dropdown-link"><img class="dropdown-img" src="images/2008.png" alt="Draft Logo">2008 NHL Draft</a>
            <a href="draft_2009.php" class="dropdown-link"><img class="dropdown-img" src="images/2009.png" alt="Draft Logo">2009 NHL Draft</a>
            <a href="draft_2010.php" class="dropdown-link"><img class="dropdown-img" src="images/2010.png" alt="Draft Logo">2010 NHL Draft</a>
            <a href="draft_2011.php" class="dropdown-link"><img class="dropdown-img" src="images/2011.png" alt="Draft Logo">2011 NHL Draft</a>
            <a href="draft_2012.php" class="dropdown-link"><img class="dropdown-img" src="images/2012.png" alt="Draft Logo">2012 NHL Draft</a>
            <a href="draft_2013.php" class="dropdown-link"><img class="dropdown-img" src="images/2013.png" alt="Draft Logo">2013 NHL Draft</a>
            <a href="draft_2014.php" class="dropdown-link"><img class="dropdown-img" src="images/2014.png" alt="Draft Logo">2014 NHL Draft</a>
            <a href="draft_2015.php" class="dropdown-link"><img class="dropdown-img" src="images/2015.png" alt="Draft Logo">2015 NHL Draft</a>
            <a href="draft_2016.php" class="dropdown-link"><img class="dropdown-img" src="images/2016.png" alt="Draft Logo">2016 NHL Draft</a>
            <a href="draft_2017.php" class="dropdown-link"><img class="dropdown-img" src="images/2017.png" alt="Draft Logo">2017 NHL Draft</a>
            <a href="draft_2018.php" class="dropdown-link"><img class="dropdown-img" src="images/2018.png" alt="Draft Logo">2018 NHL Draft</a>
            <a href="draft_2019.php" class="dropdown-link"><img class="dropdown-img" src="images/2019.png" alt="Draft Logo">2019 NHL Draft</a>
            <a href="draft_2020.php" class="dropdown-link"><img class="dropdown-img" src="images/2020.png" alt="Draft Logo">2020 NHL Draft</a>
            <a href="draft_2021.php" class="dropdown-link"><img class="dropdown-img" src="images/2021.png" alt="Draft Logo">2021 NHL Draft</a>
            <a href="draft_2022.php" class="dropdown-link"><img class="dropdown-img" src="images/2022.png" alt="Draft Logo">2022 NHL Draft</a>
            <a href="draft_2023.php" class="dropdown-link"><img class="dropdown-img" src="images/2023.png" alt="Draft Logo">2023 NHL Draft</a>
            <a href="draft_2024.php" class="dropdown-link"><img class="dropdown-img" src="images/2024.png" alt="Draft Logo">2024 NHL Draft</a>
        </div>
    </div> 

    <!--====== Nav Bar Affiliations ======-->
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown(this)">Affiliations</button>
        <div class="dropdown-content affiliations">
            <a href="affiliates_ahl.php" class="dropdown-link"><img class="dropdown-img" src="images/ahl.png" alt="AHL Logo">American Hockey League</a>
            <a href="affiliates_echl.php" class="dropdown-link"><img class="dropdown-img" src="images/echl.png" alt="ECHL Logo">East Coast Hockey League</a>
        </div>
    </div> 

    <!--====== Nav Bar Hamburger Menu ======-->
    <a href="javascript:void(0);" style="font-size:24px;" class="icon" onclick="myFunction()">&#9776;</a>

</div>
