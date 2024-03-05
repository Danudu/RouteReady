<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div>
        <?php flash('register_success'); ?>
        <h1>Login</h1>
        <p>Please fill in your credentials to login</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
            
            <div>
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>">
                <span><?php echo $data['email_err'];?></span>
            </div>
            
            <div>
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" value="<?php echo $data['password']; ?>">
                <span><?php echo $data['password_err'];?></span>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="Login">
                </div>
                <div class="col">
                    <a href="<?php echo URLROOT; ?>/users/register">No account? Register</a>
                </div>
            </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>