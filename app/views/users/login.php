<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RouteReady</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/logreg/logreg.css">
</head>

<body>
    <nav>
        <div class="nav__logo">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
        </div>
        <ul class="nav__links">
            <li class="link"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="link"><a href="<?php echo URLROOT; ?>/#about">About</a></li>
            <li class="link"><a href="<?php echo URLROOT; ?>/#services">Services</a></li>
            <li class="link"><a href="<?php echo URLROOT; ?>/#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="wrapper">
        <?php flash('register_success'); ?>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <h1>Login</h1>
            <p>Welcome back! Login to your account</p>
            <div class="input-box">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="E-mail" required>
                <i class='bx bxs-user'></i>
                <span><?php echo $data['email_err']; ?></span>
            </div>
            <div class="input-box">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" value="<?php echo $data['password']; ?>" placeholder="Password"
                    required>
                <i class='bx bxs-lock-alt'></i>
                <span><?php echo $data['password_err']; ?></span>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <input type="submit" value="Login" class="btn">

            <div class="register-link">
                <p>Dont have an account? <a href="<?php echo URLROOT; ?>/users/register">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>