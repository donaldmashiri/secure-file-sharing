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


                            <div class="col-12">
                                <div class="card card-body">
                                    <h3 class="text-white">File</h3>
                                    <?php

                                    $sql = "SELECT * FROM documents WHERE doc_id = {$_SESSION['open']}";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {

                                            $doc_id = $row["doc_id"];
                                            $doc_title = $row["doc_title"];
                                            $doc_file = $row["doc_file"];
                                            $status = $row["status"];
                                            $con_level = $row["con_level"];
                                            $date_created = $row["date_created"];
                                            $base1 = $row["base1"];
                                            $base2 = $row["base2"];
                                            $base3 = $row["base3"];

                                            if($_SESSION['base_id'] == 1){
                                                $clear = $base1;
                                            }elseif ($_SESSION['base_id'] == 2){
                                                $clear = $base2;
                                            }elseif ($_SESSION['base_id'] == 3){
                                                $clear = $base3;
                                            }
                                        }

//                                        echo $clear;

                                    }

                                    if(isset($_POST['decrypt'])){

                                        function encrypt_decrypt($string, $action = 'encrypt')
                                        {
                                            $encrypt_method = "AES-256-CBC";
                                            $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
                                            $secret_iv = '5fgf5HJ5g27'; // user define secret key
                                            $key = hash('sha256', $secret_key);
                                            $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
                                            if ($action == 'encrypt') {
                                                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                                                $output = base64_encode($output);
                                            } else if ($action == 'decrypt') {
                                                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                                            }
                                            return $output;
                                        }

                                        //Key
                                        $pwd = encrypt_decrypt($doc_file,'decrypt');
                                        $doc_file = $pwd;

                                    }

//                                    echo $clear;

                                    if($clear != 0){

                                    ?>
                                        <form action="" method="post">
                                            <button name="decrypt" type="submit" class="btn btn-primary float-right m-2"> Decrypt</button>
                                            <a href="print.php"  class="btn btn-danger float-right m-2"> Download</a>
                                        </form>
                                    <div class="card card-body text-dark bg-light">
                                        <h3 class="text-dark">  <?php echo $doc_title ?></h3>
                                        <p>
                                            <?php
                                            if($con_level === "High"){
                                                echo "<label class='badge badge-danger'>$con_level</label>";
                                            }elseif ($con_level === "Low"){
                                                echo "<label class='badge badge-info'>$con_level</label>";
                                            }elseif ($con_level === "Medium"){
                                                echo "<label class='badge badge-warning'>$con_level</label>";
                                            }else{
                                                echo "<label class='badge badge-primary'>$con_level</label>";
                                            }
                                            ?>
                                        </p>
                                        <small>  <?php echo $date_created ?></small>
                                        <hr>
                                        <div class="form-group text-dark"> <small>click text to download if it a file</small>
                                            <a href="../hq/<?php echo $doc_file ?>">   <?php echo $doc_file ?></a>
                                        </div>
                                        <hr>
                                    </div>

                                    <?php
                                    }else{
                                        echo "<p class='alert alert-danger'>You do not have Clearance Level</p>";
                                    }
                                     ?>

                                </div>

                            </div>

                            <script src="../assets/js/trix.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
<?php include "../includes/footer.php"; ?>