<?php
session_start();
require './auth.php';
$title = "Profile Edit";
require './includes/dashboard/header.php';
require_once './includes/dashboard/sidebar.php';
require './db.php';
require './session_function.php';
?>
    <div class="container">
        <?php
            if(isset($_SESSION['required'])){
        ?>
                <div class="alert alert-danger">
                    <?=$_SESSION['required']?>
                </div>
            <?php
            }
            unset($_SESSION['required']);
        ?>
<!--######################### -->
        <?php
            if(isset($_SESSION['password_error'])){
        ?>
                <div class="alert alert-danger">
                    <?=$_SESSION['password_error']?>
                </div>
        <?php
            }
            unset($_SESSION['password_error']);
        ?>
<!-- ############################ -->
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?=$_SESSION['success']?>
            </div>
        <?php
            endif;
            unset($_SESSION['success']);
        ?>
<!-- ##################### -->
        <?php if(isset($_SESSION['password_match'])):?>
            <div class="alert alert-danger">
                <?=$_SESSION['password_match']?>
            </div>
        <?php endif;
            unset($_SESSION['password_match']);
        ?>   
        <div class="row">                       
            <div class="col-md-6 m-auto">
                <form action="profile_post.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="new_password"></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                </form>
            </div>    
        </div>
    </div>
<?php 
require './includes/dashboard/footer.php';
?>