<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$reviewId = $_GET['id'];

$link = mysqli_connect($host, $username, $password, $db);

$query = "SELECT R.movieId, M.movieTitle ,R.reviewId, R.review, R.rating, R.datePosted
                 FROM reviews AS R INNER JOIN movies AS M ON R.movieId = M.movieId WHERE reviewId=$reviewId";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $movieID = $row['movieId'];
    $movieTitle = $row['movieTitle'];
    $rating = $row['rating'];
    $review = $row['review'];
    $datePosted = $row['datePosted'];
}
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

            h2 {
                text-align: center;
            }



            button {
                width: 100%;
            }


        </style>
        <title></title>
    </head>
    <body>
        <?php
        include "navbar.php";
        ?>
        <br><br>
        <?php if (!empty($reviewId)) { ?>

            <div class="container">
                <form method="post" action="doReviewDelete.php">
                    <input type="hidden" name="id" value="<?php echo $reviewId ?>"/>
                    <input type="hidden" name="movieId" value="<?php echo $movieID ?>"/>
                    <h2>Delete Review</h2><br>

                    <b>Movie Title:</b><br> <?php echo $movieTitle; ?> <br>
                    <b>Comments</b><br> <?php echo $review; ?> <br>
                    <b>Rating:</b><br> <?php echo $rating; ?> <br>
                    <b>Date:</b><br> <?php echo $datePosted; ?> <br><br>


                    Go <a href="movieInfo.php?movieId=<?php echo $movieID; ?>">Back</a> to review page <br><br>


                    <button type="submit">Confirm Delete Review</button>

                </form>
            </div>
        <?php } ?>
    </body>
</html>
