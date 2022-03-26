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
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card corona-gradient-card">
                            <div class="card-body py-0 px-0 px-sm-3">
                                <div class="row align-items-center">
                                    <div class="col-4 col-sm-3 col-xl-2">
                                        <img src="../assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                                    </div>
                                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                                        <h1 class="mb-1 mb-sm-0 text-center">Classified Secure File Sharing</h1>
                                    </div>
                                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                             <img src="../assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Air Bases</h4>
                                <p class="card-description"> View bases <code>.table</code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#.</th>
                                            <th>BaseNo.</th>
                                            <th>Base Commander</th>
                                            <th>Base Location</th>
                                            <th>Base Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php

$sql = "SELECT * FROM bases";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $base_id = $row["base_id"];
        $baseno = $row["baseno"];
        $base_commander = $row["base_commander"];
        $base_location = $row["base_location"];
        $base_name = $row["base_name"];

        ?>
                                        <tr>
                                            <td><?php echo $base_id ?></td>
                                            <td><?php echo $baseno ?></td>
                                            <td><?php echo $base_commander ?></td>
                                            <td><?php echo $base_location ?></td>
                                            <td><?php echo $base_name ?></td>
                                        </tr>
   <?php
    }
} else {
    echo "0 results";
}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
<?php include "../includes/footer.php"; ?>