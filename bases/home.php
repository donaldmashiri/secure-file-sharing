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
                      <h4 class="card-title mb-1">Base Name</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $base_name ?></h4>
                                    <p class="card-description"> Profile <code>.table</code>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#.</th>
                                                <td><?php echo "AFZ001" .$base_id ?></td>
                                            </tr>
                                            <tr>
                                                <th>BaseNo.</th>
                                                <td><?php echo $baseno ?></td>
                                            </tr>
                                            <tr>
                                                <th>Base Commander</th>
                                                <td><?php echo $base_commander ?></td>
                                            </tr>
                                            <tr>
                                                <th>Base Location</th>
                                                <td><?php echo $base_location?></td>
                                            </tr>
                                            <tr>
                                                <th>Base Name</th>
                                                <td><?php echo $base_name ?></td>
                                            </tr>






                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
<?php include "../includes/footer.php"; ?>