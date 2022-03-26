<?php include "../includes/header.php"; ?>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div style="background-image: url('zimflag.svg'); background-size: cover;" class="content-wrapper full-page-wrapper d-flex align-items-center"> 
             <!-- //auth login-bg -->
            <div class="card col-lg-4 mx-auto">
              <div class="card-header font-weight-bolder text-center">
                <img src="../airforce.png" class="justify-content-left" width="150" height="120" alt="" srcset="">
                 <h3>AFZ Classified Secure file sharing System</h3>
              </div>
              <div class="card-body px-5 py-5">
                <h6 class="card-title text-center mb-3">Base Login</h6>


                  <?php
                  if(isset($_POST['login'])){

                      $baseno = $_POST['baseno'];
                      $password = $_POST['password'];

                      $query = "select * from bases where baseno = '$baseno' and password = '$password'";
                      $result = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      $count = mysqli_num_rows($result);

                      if ($count == 1) {
                          $_SESSION['base_id'] = $row['base_id'];
                          header('location: home.php');
//                                            echo "<script>window.location.href='home.php';</script>";
                      } else {
                          echo "<h4 class='alert alert-danger'>Wrong credentials</h4>";
                      }
                  }
                  ?>

                  <form method="post" action="">
                  <div class="form-group">
                    <label>Base Name Or Number</label>
                    <input type="password" name="baseno" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" class="form-control p_input">
                  </div>
              
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
      
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>