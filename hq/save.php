<?php include "../includes/header.php"; ?>

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include "../includes/sidebar.php"; ?>
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
                    <h1 class="text-center">Air Force of Zimbabwe</h1>
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
                <?php include "subheader.php"; ?>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                    <div style="display: none" id="spinners" class="d-flex justify-content-center mt-3">
                        <div class="spinner-grow text-primary" role="status">
                            <span  class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-danger" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-light" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="encrypt.php" id="time" class="btn btn-danger btn-lg d-flex justify-content-center">Loading...</a>
                        </div>

                        <h1 id="create_text" class="text-center m-3">Creating file....</h1>
<!--                        <div>-->
<!--                            echo "<h4 class='alert alert-success'>Your Document Was successfully Created</h4>";-->
<!--                        </div>-->


                        <script>
                            let time = document.getElementById("time")
                            let text = document.getElementById("create_text")
                            time.disabled = true

                            function show(){
                                time.disabled = false
                                time.innerText = "Go to File Encryption"
                                text.innerText = "Your Document Was successfully Created"
                                text.element.className = "alert alert-success";
                            }
                            var interval = setInterval(function(){show()()},2000);
                        </script>

                    </div>
                </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <?php include "../includes/footer.php"; ?>
