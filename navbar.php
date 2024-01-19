<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" style="height: 75px;">
    <div class="container-fluid" style="margin-left: 35px;">
        <a class="navbar-brand" href="movies.php" style="font-weight:bold; font-size:35px;">CP.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <a class="nav-link" href="logout.php">Log out</a>

                    <?php } else { ?>
                        <a class="nav-link" href="login.php">Log in</a>

                    <?php } ?>

                </li>

                <?php if (isset($_SESSION['username'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="manageAccount.php">Manage Account</a>

                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="movies.php">Movies</a>
                </li>
            </ul>


            <?php if (isset($_SESSION['username'])) { ?>
                <p style ="margin: 15px">Welcome, <?php echo $_SESSION['username'] ?> </p>

            <?php } ?>


            <form action="movies.php" method="GET" class="d-flex">
                <input class="form-control me-2" type="text" name="search" placeholder="Search title">

              
                <input type="hidden" name="genre" value="">
                <input type="hidden" name="sort" value="">

                <button class="btn" type="submit" style="background-color: orange;
                        color: white;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 3px;
                        cursor: pointer;
                        width: 49%;">Search</button>
            </form>

        </div>
    </div>
</nav>