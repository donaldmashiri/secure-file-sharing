<?php include "../includes/header.php"; ?>

    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
<?php include "basesidebar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="home.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>

            <ul class="navbar-nav navbar-nav-right">
                <h1 class="text-center"><?php echo $base_name ?></h1>
                <li class="nav-item m-2">
                    <img src="../airflag.jpg" class="rounded-circle" width="50" height="50" alt="">
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">File Shared</h4>
                            <p class="text-muted mb-1">files</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body bg-light">
                                    <h3 class="text-dark">2 Factor Authentication</h3>
                                    <form action="" method="post">
                                        <div class="form-group text-dark">
                                            <label for="content">Passcode</label>
                                            <input type="password" name="password" class="form-control bg-white"
                                                   placeholder="Enter Passcode" minlength="4" required>
                                        </div>
                                        <div class="form-group text-dark">
                                            <label for="content">Authentication Keys</label>
                                            <input type="password" name="keys" class="form-control bg-white"
                                                   placeholder="Enter Authentication Keys" minlength="4" required>
                                        </div>

                                        <button name="submit" type="submit" class="btn btn-dark float-right"> Submit</button>
                                    </form>
                                </div>


                                <?php
                                $id = $_GET['open'];

                                if(isset($_POST['submit'])){
                                    $password = $conn -> real_escape_string($_POST['password']);
                                    $keys = $conn -> real_escape_string($_POST['keys']);

                                    $query = "select * from bases where password = '$password' AND baseno = '$keys'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $count = mysqli_num_rows($result);

                                    if ($count == 1) {
                                        $_SESSION['open'] = $id;
                                        header("location: file.php");
                                    } else {
                                        echo "<p class='alert alert-danger'>Incorrect Authentication Keys</p>";
                                    }
                                }



                                ?>

                            <script src="../assets/js/trix.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
<?php include "../includes/footer.php"; ?>