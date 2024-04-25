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
    <div class="container">
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
        <div class="form">
            <div class="wrapper">
                <?php flash('register_success'); ?>
                <form action="<?php echo URLROOT; ?>/hrmanagers/asEmployee" method="post">
                    <h1>Proceed to Employee Account</h1>
                    <p>Welcome back! Login to your employee account</p>
                    <div class="input-box">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="E-mail"
                            required>
                        <i class='bx bxs-user'></i>
                        <!-- <span><?php echo $data['email_err']; ?></span> -->
                    </div>
                    <div class="input-box">
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="<?php echo $data['password']; ?>"
                            placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                        <span><?php echo $data['password_err']; ?></span>
                    </div>
                    <input type="submit" value="Proceed" class="btn">

                    <div class="register-link">
                        <p>Back to Management? <a href="<?php echo URLROOT; ?>/pages/home">Back</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>