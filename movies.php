<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db);


if (isset($_GET['sort']) || isset($_GET['genre']) || isset($_GET['search'])) {
    $sort = $_GET['sort'];
    $filterGenre = $_GET['genre'];  
    $search = $_GET['search'];
} else {
    $sort = '';
    $filterGenre = '';
    $search = '';
}
$msg = "Movies";
$querySelect = "SELECT * FROM movies WHERE 1";

if (!empty($search)) {
    $querySelect .= " AND movieTitle LIKE '%$search%'";
    $msg = "Movies containing " . $search;
}

if (!empty($filterGenre)) {
    $querySelect .= " AND movieGenre = '$filterGenre'";
}

if (!empty($sort)) {
    $querySelect .= " ORDER BY $sort";
}

$querySelect2 = "SELECT DISTINCT movieGenre FROM movies";


$resultSelect = mysqli_query($link, $querySelect);
$resultSelect2 = mysqli_query($link, $querySelect2);



while ($row = mysqli_fetch_assoc($resultSelect)) {
    $arrResult[] = $row;
}

$arrGenre = array();
while ($row2 = mysqli_fetch_array($resultSelect2)) {
    $arrGenre[] = $row2['movieGenre'];
}



mysqli_close($link);
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" type="text/css" href="stylesheet.css"/> 

        <title></title>


    </head>
    <body>
        <?php
        include "navbar.php";
        ?>
        <br><br>
        <h1 style="text-align: center; font-size:50px; font-weight: bold; padding-top: 75px;">Welcome to CinephilePicks</h1>

        <h1 style="text-align:center; padding-top: 75px"><?php echo $msg ?></h1>

        <div class="container-fluid mt-3">
            <div id="eggtarts" class="row"  style="padding:0px 75px 0px">
                <form action="movies.php" method="GET" class="d-flex">
                    <input type="hidden" name="search" value="">
                    <select name="genre" class="form-control me-2">
                        <option value="" selected disabled>Filter by genre</option>
                        <option value="">All genre</option>
                        <?php
                        for ($i = 0; $i < count($arrGenre); $i++) {
                            $selected = ($filterGenre == $arrGenre[$i]) ? "selected" : "";
                            echo "<option value='" . $arrGenre[$i] . "' $selected>" . $arrGenre[$i] . "</option>";
                        }
                        ?>
                    </select>

                    <select name="sort" class="form-control me-2">
                        <option value="">Sort by</option>
                        <option value="movieTitle">Title</option>
                        <option value="movieGenre">Genre</option>
                        <option value="runningTime">Run Time</option>

                    </select>


                    <button type="submit">Confirm</button>


                </form>


            </div>


        </div>

        <div class="container-fluid mt-3">
            <div id="idk" class="row"  style="padding:0px 75px 0px">

                <?php
                for ($i = 0; $i < count($arrResult); $i++) {
                    ?>
                    <div class="col">

                        <div class="card" style="width:400px;  max-width: 400px;
                             padding: 20px;
                             background-color: #151515;
                             border-radius: 5px;
                             border: 1px solid white;
                             margin-top: 100px; ">


                            <img class="rounded" src="images/<?php echo $arrResult[$i]['picture']; ?>" alt="Card image">
                            <div class="card-body bg-dark text-white">
                                <h4 class="card-title"><b><?php echo $arrResult[$i]['movieTitle']; ?></b></h4>
                                <p class="card-text"><b>Genre:</b> <?php echo $arrResult[$i]['movieGenre']; ?></p>
                                <p class="card-text"><b>Run time:</b> <?php echo $arrResult[$i]['runningTime']; ?></p>


                                <form method="get" action="movieInfo.php">
                                    <input type="hidden" name="movieId" value="<?php echo $arrResult[$i]['movieId'] ?>">
                                    <button type="submit" class="link-button">
                                        More info
                                    </button>
                                </form>



                            </div>
                        </div>

                    </div>
                <?php } ?>


            </div>
        </div>


        <br>
    </body>
</html>
