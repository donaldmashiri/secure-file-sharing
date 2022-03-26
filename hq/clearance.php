<?php include "../includes/header.php"; ?>

    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
<?php include "../includes/sidebar.php";

if (isset($_GET['set'])) {

    $set_id = $_GET['set_id'];
    $base1 = $_GET['base1'];
    $base2 = $_GET['base2'];
    $base3 = $_GET['base3'];
//    $encrypted = "encrypted";

    $query = "UPDATE documents SET ";
    $query .= "base1  = '{$base1}', ";
    $query .= "base2  = '{$base2}', ";
    $query .= "base3  = '{$base3}' ";
    $query .= "WHERE doc_id = {$set_id} ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};

?>



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
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Clearance Level</h4>
                        <p>For Encrypted Files</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>DocNo.</th>
                                    <th>Title</th>
                                    <th>Confidential</th>
                                    <th>Status</th>
                                    <th>Base1</th>
                                    <th>Base2</th>
                                    <th>Base3</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT * FROM documents WHERE status = 'encrypted' ORDER BY doc_id DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        $doc_id = $row["doc_id"];
                                        $doc_title = $row["doc_title"];
                                        $doc_file = $row["doc_file"];
                                        $status = $row["status"];
                                        $con_level = $row["con_level"];
                                        $date_created = $row["date_created"];
                                        $base1 = $row["base1"];
                                        $base2 = $row["base2"];
                                        $base3 = $row["base3"];

                                        ?>

                                        <tr>
                                            <td><?php echo $doc_id ?></td>
                                            <td><?php echo $doc_title ?></td>
                                            <td><?php echo $con_level ?></td>
                                            <td>
                                                <?php
                                                if($status === "encrypted"){
                                                    echo "<label class='badge badge-info'> $status </label>";
                                                }else{
                                                    echo "<label class='badge badge-success'> $status</label>";
                                                }
                                                ?>
                                            </td>
                                            <form action="" method="get">
                                                <input type="hidden" name="set_id" value="<?php echo $doc_id?>">
                                            <td>
                                                <input type="number" name="base1" value="<?php echo $base1  ?>" min="0" max="2">
                                            </td>
                                                <td>
                                                <input type="number" name="base2" value="<?php echo $base2  ?>" min="0" max="2">
                                            </td>
                                                <td>
                                                <input type="number" name="base3" value="<?php echo $base3  ?>" min="0" max="2">
                                            </td>
                                                <td>
                                                    <button name="set" type="submit" class="btn btn-primary">set</button>
                                                </td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
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