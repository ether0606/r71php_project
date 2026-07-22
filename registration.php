<?php require_once "component/auth_header.php"; ?>


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input name="name" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
                                <label for="floatingText">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="contact_no" type="text" class="form-control" id="floatingInput" placeholder="Contact Number">
                                <label for="floatingInput">Contact Number</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input name="confirm_password" type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password">
                                <label for="floatingConfirmPassword">Confirm Password</label>
                            </div>
                        
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a href="<?= $base_url; ?>login.php">Sign In</a></p>
                        </form>
                        <?php
                            if($_POST){ 
                               
                                $_POST['password'] = sha1($_POST['password']);
                       
                                if($_POST['password'] !== sha1($_POST['confirm_password'])){
                                    echo "<div class='alert alert-danger mt-3'>Passwords do not match</div>";
                                } else {
                                    unset($_POST['confirm_password']); // Remove confirm_password from the data to be inserted
                                    $rs = $crud->common_insert("users", $_POST);
                                    if($rs && $rs['status']){
                                        echo "<div class='alert alert-success mt-3'>Registration successful. Please <a href='{$base_url}login.php'>login</a>.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger mt-3'>Registration failed. Please try again.</div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

   <?php require_once "component/footer.php"; ?>