<?php
session_start();
require './auth.php';
$title = "Portfolio Edit";
require './includes/dashboard/header.php';
require_once './includes/dashboard/sidebar.php';
require './db.php';

$portfolio_id = $_GET['portfolio_id'];
$portfolio_select_query = "SELECT * FROM portfolios WHERE id = '$portfolio_id'";
$portfolio_from_db = mysqli_query($database_connection, $portfolio_select_query);
$after_assoc = mysqli_fetch_assoc($portfolio_from_db);
?>
<div class="row">
    <div class="col-md-5 m-auto">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Edit Portfolio</div>
                <div class="card-body">
                    <form method="post" action="portfolio_edit_post.php" enctype = "multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Portfolio Name</label>
                            <input type="hidden" value="<?=$portfolio_id?>">
                            <input type="text" class="form-control" name="portfolio_name" value="<?=$after_assoc['portfolio_name']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Portfolio Information</label>
                            <textarea  class="form-control" name="portfolio_information" rows="8" cols="80"><?=$after_assoc['portfolio_information']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Old Portfolio Image</label>
                            <img class=" img-fluid" src="/login_system/uploads/portfolio/<?=$after_assoc['portfolio_image']?>"alt="not found">
                            <br>
                            <br>
                            <label for="exampleInputPassword1">Portfolio Image</label>
                            <input type="file" name="portfolio_image" >
                        </div>
                            <button type="submit" class="btn btn-primary btn-sm" >Edit</button>
                    </form>
                </div>
            </div>      
        </div>
    </div>    
</div> 
<?php
require './includes/dashboard/footer.php';
?>