<?php include "../includes/header.php"; ?>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div style="background-image: url('zimflag.svg'); background-size: cover;" class="content-wrapper full-page-wrapper d-flex align-items-center"> 
             <!-- //auth login-bg -->
            <div class="card col-lg-4 mx-auto">
              <div class="card-header font-weight-bolder text-center">
                <img src="../airforce.png" class="justify-content-left" width="150" height="120" alt="" srcset="">
                 <h3>AFZ Head Quarters</h3>
              </div>
              <div class="card-body px-5 py-5">
                  <?php
                  if(isset($_POST['login'])){
                      $passcode = $_POST['passcode'];

                      if($passcode === "12345"){
                          header('Location: home.php');
                      }else{
                          echo "<h4 class='alert alert-danger text-center'>In Correct</h4>";
                      }
                  }
                  ?>

                <form action="" method="post">
                  <div class="form-group">
                          <label>PASSCODE </label>
                          <input type="password" name="passcode" class="form-control p_input">
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
<?php include "../includes/footer.php"; ?>