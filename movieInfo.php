<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$movieID = $_GET['movieId'];

$link = mysqli_connect($host, $username, $password, $db);


$querySelect = "SELECT *
                FROM movies";

$querySelect2 = "SELECT R.movieId, U.userId,R.reviewId, R.review, R.rating, R.datePosted, U.username
                 FROM reviews AS R INNER JOIN users AS U ON R.userId = U.userId";

// execute sql query
$resultSelect = mysqli_query($link, $querySelect);

$resultSelect2 = mysqli_query($link, $querySelect2);

// process the result
while ($row = mysqli_fetch_assoc($resultSelect)) {
    $arrResult[] = $row;
}

while ($row = mysqli_fetch_assoc($resultSelect2)) {
    $arrResult2[] = $row;
}

for ($i = 0; $i < count($arrResult); $i++) {
    if ($arrResult[$i]['movieId'] == $movieID) {

        $movieName = $arrResult[$i]['movieTitle'];
        $movieGenre = $arrResult[$i]['movieGenre'];
        $movieRunTime = $arrResult[$i]['runningTime'];
        $movieLanguage = $arrResult[$i]['language'];
        $moviePic = $arrResult[$i]['picture'];
        $movieDirector = $arrResult[$i]['director'];
        $movieCast = $arrResult[$i]['cast'];
        $movieSynopsis = $arrResult[$i]['synopsis'];
    }
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

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid white; 
            }

            td {
                padding: 8px; 
                text-align: left;
                border: 1px solid black; 
            }
            th{
                background-color: orange;
                padding: 8px; 
                text-align: left;
                border: 1px solid black; 
            }
        </style>

        <title></title>
    </head>
    <body>
        <?php
        include "navbar.php";
        ?>
        <br><br>

        <div class="container-fluid mt-3">
            <div id="idk" class="row"  style="padding:75px">
                <div class="card" style="width:400px;  max-width: 400px;
                     padding: 20px;
                     background-color: #151515;
                     border-radius: 5px;
                     border: 1px solid white;
                     margin-top: 45px; "> 


                    <img class="rounded" src="images/<?php echo $moviePic ?>" alt="Card image">
                </div>
                <div class="col" style="padding:75px">
                    <h2><b><?php echo $movieName ?></b></h2><br>

                    <p><b>Genre:</b> <?php echo $movieGenre; ?><br></p>
                    <p><b>Run time:</b> <?php echo $movieRunTime; ?><br></p>
                    <p><b>Language:</b> <?php echo $movieLanguage; ?><br></p>
                    <p><b>Director:</b> <?php echo $movieDirector; ?><br></p>
                    <p><b>Cast:</b> <?php echo $movieCast; ?><br></p>
                    <p><b>Synopsis:</b> <?php echo $movieSynopsis; ?><br></p>


                    </p>

                    <button onclick="scrollToDiv()">See reviews</button>

                    <script>
                        function scrollToDiv() {
                            var element = document.getElementById("BRUHMOMENT");
                            element.scrollIntoView();
                        }
                    </script>




                </div>
            </div>
        </div>

        <div class="container-fluid mt-3">
            <div id="BRUHMOMENT" class="row"  style="padding:75px">
                <div class="col">
                    <h2><b>Reviews</b></h2><br>

                    <?php if (isset($_SESSION['username'])) { ?>

                    <h5>Add review <a href="addReview.php?id=<?php echo $movieID?>">here</a></h5><br><br>
                    <?php } ?>

                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date Posted</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        <?php
                        for ($i = 0; $i < count($arrResult2); $i++) {
                            if ($arrResult2[$i]['movieId'] == $movieID) {
                                ?>
                                <tr>
                                    <td><?php echo $arrResult2[$i]['username']; ?></td>
                                    <td><?php echo $arrResult2[$i]['rating']; ?></td>
                                    <td><?php echo $arrResult2[$i]['review']; ?></td>
                                    <td><?php echo $arrResult2[$i]['datePosted']; ?></td>
                                    <td><?php
                                        if (isset($_SESSION['username'])) {
                                            echo ($_SESSION['username'] == $arrResult2[$i]['username']) ? '<a href="reviewEdit.php?id=' . $arrResult2[$i]['reviewId'] . '">Edit</a>' : '';
                                        } else {
                                            ?>
                                        <?php } ?>
                                    </td>
 
                                    <td><?php
                                        if (isset($_SESSION['username'])) {
                                            echo ($_SESSION['username'] == $arrResult2[$i]['username']) ? '<a href="reviewDelete.php?id=' . $arrResult2[$i]['reviewId'] . '">Delete</a>' : '';
                                        } else {
                                            ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>


                </div>  
            </div>
        </div>





        <br>
    </body>
</html>