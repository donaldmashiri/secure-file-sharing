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
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title mb-1">Create File Projects</h4>
                                    <p class="text-muted mb-1">Classfied File</p>
                                </div>
                                <div class="row">
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                    <div class="col-12">
                                        <div class="card card-body bg-light">
                                            <?php
                                            if(isset($_POST['create'])){
                                                $level = $conn -> real_escape_string($_POST['level']);
                                                $doc_title = $conn -> real_escape_string($_POST['doc_title']);
                                                $content = $conn -> real_escape_string($_POST['content']);

                                                $sql = "INSERT INTO documents (doc_title, con_level, doc_file, date_created)
                                                    VALUES ('{$doc_title}','{$level}', '{$content}',now())";

                                                if ($conn->query($sql) === TRUE) {

                                                    header("Location: save.php");


                                                }else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }

                                            }


                                            ?>
                                            <form action="" method="post">
                                                <div class="form-group text-dark">
                                                    <label for="content">Title</label>
                                                    <input type="text" name="doc_title" class="form-control bg-white"
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
                                                <div class="form-group text-dark">
                                                    <label for="content">Content</label>
                                                    <input  id="content" type="hidden" name="content" required>
                                                    <trix-editor input="content"></trix-editor>
                                                </div>
                                                <button name="create" type="submit" class="btn btn-dark float-right"> Create File</button>
                                            </form>
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