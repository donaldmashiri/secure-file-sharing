<?php include ("db.php"); ?>


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
<body>


<?php
//function encrypt_decrypt($string, $action = 'encrypt')
//{
//    $encrypt_method = "AES-256-CBC";
//    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
//    $secret_iv = '5fgf5HJ5g27'; // user define secret key
//    $key = hash('sha256', $secret_key);
//    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
//    if ($action == 'encrypt') {
//        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
//        $output = base64_encode($output);
//    } else if ($action == 'decrypt') {
//        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
//    }
//    return $output;
//}
?>