<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div>
        <h1>Create an Account</h1>
        <p>Please fill out this form to register</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div>
                <label for="name">Name: <sup>*</sup></label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>">
                <span><?php echo $data['name_err'];?></span>
            </div>
            <div>
                <label for="emp_id">Employee ID: <sup>*</sup></label>
                <input type="text" name="emp_id" value="<?php echo $data['emp_id']; ?>">
                <span><?php echo $data['emp_id_err'];?></span>
            </div>
            <div>
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>">
                <span><?php echo $data['email_err'];?></span>
            </div>
            <div>
                <label for="contact_num">Contact: <sup>*</sup></label>
                <input type="text" name="contact_num" value="<?php echo $data['contact_num']; ?>">

            </div>
            <div>
                <label for="address">Address: <sup>*</sup></label>
                <input type="text" name="address" value="<?php echo $data['address']; ?>">

            </div>
            <div>
                <label for="department">Department: <sup>*</sup></label>
                <input type="text" name="department" value="<?php echo $data['department']; ?>">
            </div>
            <div>
                <label for="designation">Designation: <sup>*</sup></label>
                <!-- <input type="text" name="designation" value="<?php echo $data['designation']; ?>"> -->
                <select name="designation" id="designation">
                    <option value="employee">Employee</option>
                    <option value="driver">Driver</option>
                    <option value="hrmanager">HR Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" value="<?php echo $data['password']; ?>">
                <span><?php echo $data['password_err'];?></span>
            </div>
            <div>
                <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span><?php echo $data['confirm_password_err'];?></span>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="Register">
                </div>
                <div class="col">
                    <a href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a>
                </div>
            </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>