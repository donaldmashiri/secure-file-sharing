<?php include "../includes/header.php";

$type = $_GET['file'];
?>

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
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Create File Projects</h4>
                            <p class="text-muted mb-1">Classfied File</p>
                        </div>
                        <div class="row">

                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <div class="col-12">
                                <div class="card card-body bg-light">
                                    <?php
                                    if(isset($_POST['create'])){
                                        $level = $conn -> real_escape_string($_POST['level']);
                                        $doc_title = $conn -> real_escape_string($_POST['doc_title']);

                                    if($type === 'text'){
                                        $content = $conn -> real_escape_string($_POST['content']);
                                    }elseif ($type === 'file'){
                                        $content = $_FILES['content']['name'];
                                        $content_image_temp = $_FILES['content']['tmp_name'];
                                        move_uploaded_file($content_image_temp, "$content");
                                    }


//                                        echo $content;

                                        $sql = "INSERT INTO documents (doc_title, con_level, doc_file, date_created)
                                                    VALUES ('{$doc_title}','{$level}', '{$content}',now())";

                                        if ($conn->query($sql) === TRUE) {

                                            header("Location: save.php");


                                        }else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                    }


                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <hr>
                                        <div class="form-group text-dark">
                                            <label for="content">Create File by :</label>
                                            <select name="" id="" class=" form-control text-white mb-3" onchange="location = this.value;">
                                                <option value="create_file.php">select :</option>
                                                <option value="create_file.php?file=text">Text</option>
                                                <option value="create_file.php?file=file">Upload</option>
                                            </select>
                                        </div>

                                        <?php

                                        if($type === 'text'){
                                            echo "
                                            <div class='form-group text-dark'>                                            
                                            <textarea cols='30' rows='10' class='form-control text-dark bg-secondary'  id='content' name='content' ></textarea>
                                        </div>
                                            ";
                                        }elseif ($type === 'file'){
                                            echo "
                                            <div class='form-group text-dark'>
                                    
                                            <input type='file' class='form-control' name='content'>
                                        </div>
                                            ";
                                        }
                                        ?>

                                        <hr>
                                        <div class="form-group text-dark">
                                            <label for="content">Title</label>
                                            <input type="text" name="doc_title" class="form-control text-white"
                                                   placeholder="Enter Title" minlength="4" required>
                                        </div>
                                        <div class="form-group text-dark">
                                            <label for="content">Confidential Level</label>
                                            <select name="level" class="form-control text-danger" id="">
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                                <option value="Very High">Very High</option>
                                            </select>
                                        </div>
<!--                                        <div class=" form-group text-dark">-->
<!--                                            <label for="content">Content</label>-->
<!--                                            <textarea cols="30" rows="10" class="form-control text-dark bg-secondary"  id="content" type="hidden" name="content" ></textarea>-->
<!--                                        </div>-->




                                <button name="create" type="submit" class="btn btn-dark float-right"> Create File</button>
                                    </form>
                                </div>

                            </div>
<!--                            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
                            <script src="../assets/js/trix.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <?php include "../includes/footer.php"; ?>

