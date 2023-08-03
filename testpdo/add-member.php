<?php
session_start();
include_once 'connection.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test PHP PDO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-1 fs-5" href="index.php">Test PHP PDO</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="mr-2 d-block d-sm-inline">
            <a href="./profile.php" class="text-decoration-none text-white w-100">
                <?php
                // $id = $_SESSION['users']['users_id'];
                // $query = "SELECT * FROM `users` WHERE `Id` = '$id'";
                // $query_run = mysqli_query($connection, $query);
                // if ($query_run) {
                //     while ($row = mysqli_fetch_array($query_run)) {
                //         // display in user's name
                //         echo $row['Firstname'] . " " . $row['Surname'];
                //     }
                // }
                ?>
            </a>
        </span>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <!-- <form action="./logic/logout.php" method="post">
                <button type="submit" name="logout" class="btn btn-outline-warning border-0 rounded-0"
                onclick="return confirm('Confirm sign out')"><i class="fa fa-sign-out"></i> Sign Out</button>
            </form> -->
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-member.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Add member
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add new record</h1>
                </div>

                <div class="container-fluid">
                    <?php include_once 'alerts.php' ; ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="code.php" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname">First name</label>
                                            <input type="text" class="form-control rounded-0" name="firstname" id="firstname" minlength="2" maxlength="32" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="surname">Surname</label>
                                            <input type="text" class="form-control rounded-0" name="surname" id="surname" minlength="2" maxlength="32" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="birthdate">Date of Birth</label>
                                            <input type="date" class="form-control rounded-0" name="birthdate" id="birthdate" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control rounded-0" name="email" id="email" minlength="6" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 my-3 btn btn-lg rounded-0 btn-outline-primary" name="add">
                                    Add record
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>