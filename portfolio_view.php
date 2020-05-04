<?php
session_start();
require './auth.php';
$title = "Portfolio";
require './includes/dashboard/header.php';
require_once './includes/dashboard/sidebar.php';
require './db.php';
require './session_function.php';

//fetching data from database
$portfolio_select_query = "SELECT * FROM portfolios";
$portfolios_from_db = mysqli_query($database_connection, $portfolio_select_query);
?>

    <!-- error showing -->
    <?php if(isset($_SESSION['file_error'])):?>
        <div class="alert alert-danger">
            <?=$_SESSION['file_error']?>
        </div>
        <?php
        endif;
        unset($_SESSION['file_error']);
    ?>
    <?php if(isset($_SESSION['size_error'])):?>
        <div class="alert alert-danger">
            <?=$_SESSION['size_error']?>
        </div>
        <?php
        endif;
        unset($_SESSION['size_error']);
    ?>
    <?php if(isset($_SESSION['file_empty'])):?>
        <div class=" alert alert-danger">
            <?=$_SESSION['file_empty']?>
        </div>
    <?php endif;
        unset($_SESSION['file_empty']);
    ?>    
    <!-- error showing -->
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <table class="table bg-dark text-white" id="portfolio_table">
                <thead>
                    <tr>    
                        <th scope="col">Serial</th>
                        <th scope="col">Id</th>
                        <th scope="col">Portfolio Name</th>
                        <th scope="col">Portfolio Information</th>
                        <th scope="col">Portfolio Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $serial = 1; 
                    foreach($portfolios_from_db as $port):?>
                    <tr>
                        <td><?=$serial++?></td>
                        <td><?=$port['id']?></td>
                        <td><?=ucwords($port['portfolio_name'])?></td>
                        <td><?=ucwords($port['portfolio_information'])?></td>
                        <td>
                            <img src="/login_system/uploads/portfolio/<?=$port['portfolio_image']?>" alt="<?=$port['portfolio_image']?>">
                        </td>
                        <td>
                            <a href="portfolio_edit.php?portfolio_id=<?=$port['id']?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    <tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Add Portfolio</div>
                    <div class="card-body">
                        <form method="post" action="portfolio_post.php" enctype = "multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Portfolio Name</label>
                                <input type="text" class="form-control" name="portfolio_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Portfolio Information</label>
                                <textarea  class="form-control" name="portfolio_information" rows="8" cols="80"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Portfolio Image</label>
                                <input type="file" name="portfolio_image">
                            </div>
                                <button type="submit" class="btn btn-primary btn-sm" >Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>

<?php 
require "./includes/dashboard/footer.php";
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#portfolio_table').DataTable();
    });
</script>