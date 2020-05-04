<?php
session_start();
require './auth.php';
$title = "Service Edit";
require './includes/dashboard/header.php';
require_once './includes/dashboard/sidebar.php';
require './db.php';

$service_id = $_GET['service_id'];
$get_query = "SELECT * FROM services WHERE id = $service_id";
$from_db = mysqli_query($database_connection, $get_query);
$after_assoc = mysqli_fetch_assoc($from_db);
?>

<div class="row">
    <div class="col-md-4 m-auto ">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Edit Service</div>
                    <div class="card-body">
                        <form method="post" action="service_edit_post.php">
                            <input type="hidden" name="service_id" value="<?=$service_id?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon</label>
                                <input type="text" class="form-control" name="service_icon" value="<?=$after_assoc['service_icon']?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Service Title</label>
                                <input type="text" class="form-control" name="service_title" value="<?=$after_assoc['service_title']?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Service Description</label>
                                <textarea  class="form-control" name="service_description" rows="8" cols="80"><?=$after_assoc['service_description']?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>      
            </div>  
    </div>
<?php
require './includes/dashboard/footer.php';
?>