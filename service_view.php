<?php
session_start();
require './auth.php';
$title = "Service";
require './includes/dashboard/header.php';
require_once './includes/dashboard/sidebar.php';
require './db.php';
require './session_function.php';

//fetching data from database
$select_query = "SELECT * FROM services";
$data_from_db = mysqli_query($database_connection, $select_query);

// Active Services Count
$select_active_query = "SELECT COUNT(*)  AS active_service FROM services WHERE service_status = 2";
$active_service_from_db = mysqli_query($database_connection, $select_active_query);
$after_assoc_active = mysqli_fetch_assoc($active_service_from_db)['active_service'];

?>
    <?php
        if(isset($_SESSION['danger'])):
        ?>
            <div class="alert alert-danger">
                <?=$_SESSION['danger']?>
            </div>
        <?php
        endif;
            unset($_SESSION['danger']);
        ?>

    <?php
        if(isset($_SESSION['success'])):
        ?>
        <div class="alert alert-success">
            <?=$_SESSION['success']?>
        </div>
        <?php
        endif;
        unset($_SESSION['success']);
    ?>
    <div class="row">
        <div class="col-md-9">
            <table class="table bg-dark text-white">
            <button type="button" class="btn btn-primary mb-3">
                Active Service 
                <span class="badge badge-dark"><?=$after_assoc_active?></span>
            </button>
            <?php
                if(isset( $_SESSION['service_error'])):
            ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['service_error']?>
                </div>
            <?php
                endif;
                unset($_SESSION['service_error']);
            ?>
                <thead>
                    <tr>    
                        <th scope="col">Serial</th>
                        <th scope="col">Id</th>
                        <th scope="col">Service Icon</th>
                        <th scope="col">Service Title</th>
                        <th scope="col">Service Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $serial = 1;          
                        foreach($data_from_db as $data):
                    ?>
                    <tr>
                        <th><?=$serial++?></th>
                        <th><?=$data['id']?></th>
                        <td>
                            <i class="<?=$data['service_icon']?>"></i>
                        </td>
                        <td><?=$data['service_title']?></td>
                        <td><?=$data['service_description']?></td>
                        <td>
                            <!-- Code for active/deactive button of service view page -->
                            <?php if($data['service_status'] == 1):?>
                                <a href="service_status_change.php?service_id=<?=$data['id']?>&btn=active" class="btn btn-primary btn-sm">Active</a>
                            <?php endif;?>
                            <?php if($data['service_status'] == 2):?>
                                <a href="service_status_change.php?service_id=<?=$data['id']?>&btn=deactive" class="btn btn-warning btn-sm">Deactive</a>
                            <?php endif;?>
                            <!-- End -->

                            <a href="service_edit.php?service_id=<?=$data['id']?>" class="btn btn-info btn-sm">Edit</a>
                            <!-- <a  href="service_delete.php?service_id=<?=$data['id']?>" class="btn btn-danger btn-sm">Delete</a> -->
                            <button class="btn btn-danger btn-sm delete_btn" value="service_delete.php?service_id=<?=$data['id']?>">Delete</button>
                        </td>
                    <tr>    
                    <?php endforeach;?>
                </tbody>
            </table>
            <br>
            <?php if($data_from_db->num_rows == 0):?>
                    <div class="alert alert-danger">
                        <h4>Nothing To Show!</h4>
                    </div>
                <?php endif;?>
        </div>
        <div class="col-md-3">
        <div class="card text-white bg-dark mb-3" >
            <div class="card-header">Add Service</div>
                <div class="card-body">
                    <form method="post" action="service_post.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Icon</label>
                            <input type="text" class="form-control" name="service_icon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Service Title</label>
                            <input type="text" class="form-control" name="service_title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Service Description</label>
                            <textarea  class="form-control" name="service_description" rows="8" cols="80"></textarea>
                        </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="submit">Submit</button>
                    </form>
                </div>
                <a href="https://fontawesome.com/icons?d=gallery" class="btn btn-primary btn-sm" target="_blank">Get Icon List</a>
            </div>      
        </div>
    </div>
<?php
require './includes/dashboard/footer.php';
?>
<script>
    $(document).ready(function(){
        $('.delete_btn').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    var link_to_go = $(this).val();
                    window.location.href = link_to_go;
                }
                })
        })
    });
</script>