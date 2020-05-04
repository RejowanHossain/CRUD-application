<?php
session_start();
$title = "Register";
require './includes/dashboard/header.php';
    
?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <div class="row">
                <div class="col-lg-6 bg-white">
                  <div class="auth-form-light text-left p-5">
                    <h2>Register</h2>
                    <h4 class="font-weight-light">Hello! let's get started</h4>
                    <br>
                    <?php
                            if(isset($_SESSION['success'])){
                          ?>
                            <div class="alert alert-success">
                              <?=$_SESSION['success']?>
                            </div>
                          <?php
                            }
                          ?>
                    <form class="pt-4" method="post" action="register_post.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="user_name">
                          <i class="mdi mdi-account"></i>
                        </div>
                        <?php
                            if(isset($_SESSION['required'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['required']?>
                            </div>
                          <?php
                            }
                          ?>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="user_email">
                          <i class="mdi mdi-email"></i>
                        </div>
                        <?php
                            if(isset($_SESSION['mail_exist'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['mail_exist']?>
                            </div>
                          <?php
                            }
                          ?>
                        <?php
                            if(isset($_SESSION['required'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['required']?>
                            </div>
                          <?php
                            }
                          ?>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user_password">
                          <i class="mdi mdi-eye"></i>
                        </div>
                        <?php
                            if(isset($_SESSION['required'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['required']?>
                            </div>
                          <?php
                            }
                          ?>
                        <div class="form-group">
                          <label for="exampleInputPassword2">Confirm Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm password" name="confirm_password">
                          <i class="mdi mdi-eye"></i>
                          <br>
                          <?php
                            if(isset($_SESSION['required'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['required']?>
                            </div>
                          <?php
                            }
                          ?>
                          <?php
                            if(isset($_SESSION['password_error'])){
                          ?>
                            <div class="alert alert-danger">
                              <?=$_SESSION['password_error']?>
                            </div>
                          <?php }
                            session_destroy();
                          ?>
                        </div>
                        <div class="mt-5">
                          <button class="btn btn-block btn-primary btn-lg font-weight-medium" type="submit">Register</button>
                        </div>
                        <div class="mt-2 w-75 mx-auto">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                              I accept terms and conditions
                            </label>
                          </div>
                        </div>
                        <div class="mt-2 text-center">
                          <a href="login.php" class="auth-link text-black">Already have an account? <span class="font-weight-medium">Sign in</span></a>
                        </div>                 
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
              </div>
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
<?php
    require './includes/dashboard/footer.php';
?>