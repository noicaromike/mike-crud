<div class="container mt-5 d-flex justify-content-center">
    <div class="card" style="width: 500px;">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('login'); ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="Enter your email">
                    <small class="text-danger text-sm mt-2"><?php echo $emailError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <small class="text-danger text-sm mt-2"><?php echo $passwordError; ?></small>
                </div>
                <div class="my-3">
                    <small>Don't have an Account? <a class="" href="<?php echo base_url('register'); ?>">Register here</a></small>
                </div>
                <button class="btn btn-primary" style="width: 100% ;">Login</button>
            </form>
        </div>
    </div>
</div>