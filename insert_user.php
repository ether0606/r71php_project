
<?php require_once "component/header.php"; ?>

<!-- Sidebar Start -->
<?php require_once "component/sidebar.php"; ?>
<!-- Sidebar End -->

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add User</h6>
                <form action="" method="post">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contact_no" class="col-sm-4 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input name="contact_no" type="text" class="form-control" id="contact_no" placeholder="Enter your contact number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
       


    <?php
        if($_POST){
            $_POST['password'] = sha1($_POST['password']);
            $rs=$crud->common_insert("users", $_POST);
            if($rs && $rs['status']){
                echo "<script>window.location='users_list.php'</script>";
            } else {
                echo "Error: " . $rs['message'];
            }
        }
    ?>

<?php require_once "component/footer.php"; ?>