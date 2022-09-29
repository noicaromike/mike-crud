<!-- home page -->




<div class="container my-5 d-flex justify-content-center">
    <div class="card" style="width: 500px;">
        <div class="card-header">
            <h3>Register</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('register'); ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" value="<?php echo $first_name; ?>" name="first_name" placeholder="Enter your name">
                    <small class="text-danger text-sm mt-2"><?php echo $first_nameError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $last_name; ?>" name="last_name" placeholder="Enter your last name">
                    <small class="text-danger text-sm mt-2"><?php echo $last_nameError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="Enter your email">
                    <small class="text-danger text-sm mt-2"><?php echo $emailError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" value="<?php echo $password; ?>" name="password" placeholder="Enter your Password">
                    <small class="text-danger text-sm mt-2"><?php echo $passwordError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm your password">
                    <small class="text-danger text-sm mt-2"><?php echo $confirmPasswordError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact</label>
                    <input type="text" class="form-control" value="<?php echo $contact; ?>" name="contact" placeholder="Enter your contact no.">
                    <small class="text-danger text-sm mt-2"><?php echo $contactError; ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" value="<?php echo $address; ?>" name="address" placeholder="Enter your address">
                    <small class="text-danger text-sm mt-2"><?php echo $addressError; ?></small>
                </div>
                <button class="btn btn-primary" style="width: 100%;">Register</button>
            </form>
        </div>
        <div class="text-center my-3">
            <a href="<?php echo base_url('login'); ?>">Login Instead</a>
        </div>
    </div>

</div>