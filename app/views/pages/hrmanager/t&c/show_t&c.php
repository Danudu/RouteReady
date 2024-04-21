<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show T&C | RouteReady</title>
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
            padding: 20px;
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

        .button-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
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

        div {
            color: var(--text-light);
            margin-bottom: 10px;
        }

        p {
            margin-top: 5px;
        }

        a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: var(--white);
        }

        hr {
            border-color: var(--primary-color-light);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .edit-delete-buttons {
            display: flex;
            gap: 10px;
        }

        .back-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
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

        <h1><?php echo $data['post']->title; ?></h1>

        <div>
            Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->date; ?>
        </div>

        <p><?php echo $data['post']->body; ?></p>

        <?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
            <hr>
            <div class="button-wrapper">
                <div class="edit-delete-buttons">
                    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="button">Edit</a>
                    <form class="" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>"
                        method="post">
                        <input type="submit" value="Delete" class="button">
                    </form>
                </div>
            </div>
        <?php endif; ?>
        <a href="<?php echo URLROOT; ?>/posts/terms" class="button back-button">Back</a>
    </div>
</body>

</html>