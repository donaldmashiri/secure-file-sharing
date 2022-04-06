<?php include ("../includes/db.php"); ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Air Force of Zimbabwe</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../airforce.png" />
    </head>
<body onload="window.print();">

    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
<?php
$sql = "SELECT * FROM bases WHERE base_id = '{$_SESSION['base_id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    $row = $result->fetch_assoc();

    $base_id = $row["base_id"];
    $baseno = $row["baseno"];
    $base_commander = $row["base_commander"];
    $base_location = $row["base_location"];
    $base_name = $row["base_name"];
}
?>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->

    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1"><?php echo $base_name ?></h4>
                        <p class="text-muted mb-1"><?php echo $base_commander ?></p>
                    </div>
                    <div class="row">
                        <div class="col-12">

                                <div class="card card-body">
                                    <h3 class="text-white">
                                        <img src="../airflag.jpg" width="50" height="50" class="rounded-circle" alt="">
                                    </h3>

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

                                        }
                                    }

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


                                        ?>
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
                                            <div class="form-group text-dark">
                                                <?php echo $doc_file ?>
                                            </div>
                                            <hr>
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