<?php include "../includes/header.php";

($_SESSION['open'] = "closed");

?>

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
                            <div class="col-lg-10 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $base_name ?></h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="preview-list">
                                                    <?php

                                                    $sql = "SELECT * FROM documents WHERE status = 'encrypted' ORDER BY doc_id DESC";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {

                                                            $doc_id = $row["doc_id"];
                                                            $doc_title = $row["doc_title"];
                                                            $doc_file = $row["doc_file"];
                                                            $con_level = $row["con_level"];
                                                            $date_created = $row["date_created"];

                                                            if($con_level === "High"){
                                                                $bgcolor = "bg-danger";
                                                            }else{
                                                                $bgcolor = "bg-primary";
                                                            }

                                                            ?>

                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-thumbnail">
                                                                    <div class="preview-icon <?php echo $bgcolor ?>">
                                                                        <i class="mdi mdi-file-document"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="flex-grow">
                                                                        <h6 class="preview-subject"><?php echo $doc_title ?></h6>
                                                                        <p class="text-muted mb-0">
                                                                        </p>
                                                                    </div>
                                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                        <p class="text-muted">
                                                                            <a href="open.php?open=<?php echo $doc_id ?>" class="btn btn-primary btn-sm">open</a>
                                                                        </p>
                                                                        <p class="text-muted mb-0"><?php echo $date_created ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>

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
        </div>

    </div>
    <!-- content-wrapper ends -->
<?php include "../includes/footer.php"; ?>