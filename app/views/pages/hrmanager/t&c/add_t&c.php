<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add T&C | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
        }

        body {
            background-color: var(--primary-color);
            color: var(--text-light);
            font-family: Arial, sans-serif;
            /* padding: 20px; */
            position: relative;
            /* Needed for positioning the back button */
            
        }




        nav {
            max-width: var(--max-width);
            margin: auto;
            padding: 1rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        a {
            text-decoration: none;
        }

        .nav__logo {
            max-width: 90px;

        }

        .nav__logo img {
            width: 75%;
            border-radius: 30%;
        }

        .nav__links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .link a {
            position: relative;
            padding-bottom: 0.75rem;
            color: var(--white);
        }

        .link a::after {
            content: "";
            position: absolute;
            height: 2px;
            width: 0;
            left: 0;
            bottom: 0;
            background-color: var(--text-light);
            transition: 0.3s;
        }

        .link a:hover::after {
            width: 50%;
        }

        .wrapper {
            background-color: rgba(31, 33, 37, 0.4);
            border: 2px solid var(--primary-color-extra-light);
            color: var(--white);
            border-radius: 12px;
            padding: 30px 40px;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 80px;
            max-width: 600px;
        }

        .button {
            width: 150px;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            margin-right: 10px;
        }

        .button:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        h1 {
            color: var(--white);
            margin-bottom: 20px;

        }

        p {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        form {
            background-color: var(--primary-color-extra-light);
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            color: var(--white);
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 40px);
            padding: 15px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: var(--primary-color-light);
            color: var(--white);
            font-size: 16px;
        }

        input[type="text"]::placeholder {
            font-size: 20px;
        }

        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        input[name="body"] {
            width: calc(100% - 40px);
            height: 200px;
        }

        input[type="submit"] {
            width: 150px;
            height: 45px;
            background: var(--text-light);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            text-align: center;
            line-height: 45px;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-color-light);
            color: var(--white);
            box-shadow: 0 0 10px var(--primary-color-extra-light);
        }

        span {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            display: block;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav__logo">
                <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.jpg" alt="logo" /></a>
            </div>
            <div class="nav__links">
                <p class="link"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></p>
            </div>
        </nav>
        <div class="wrapper">
            <h1>Add Terms & Conditions</h1>
            <p>Add T&C using this form</p>
            <form action="<?php echo URLROOT; ?>/posts/add" method="POST">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Enter Title">
                <span><?php echo $data['title_err']; ?></span>

                <label for="body">Body:</label>
                <input type="text" name="body" value="<?php echo $data['body']; ?>" placeholder="Enter T&C Body">
                <span><?php echo $data['body_err']; ?></span>

                <input type="submit" value="Submit" class="button">
            </form>
        </div>

        <!-- Back button outside of the wrapper -->
        <a href="<?php echo URLROOT; ?>/posts/terms" class="button back-button">Back</a>
    </div>
</body>

</html>