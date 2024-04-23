<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T&C | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
    <style>
        /* Color Variables */
        :root {
            --primary-color: #111317;
            --primary-color-light: #1f2125;
            --primary-color-extra-light: #35373b;
            --text-light: #d1d5db;
            --white: #ffffff;
            --max-width: 1200px;
        }

        body {
            background-color: var(--primary-color);
            color: var(--text-light);
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
            position: relative;

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
            max-width: 800px;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 60px;
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

        h4 {
            margin-bottom: 5px;
        }

        p {
            margin-top: 5px;
        }

        .more-button {
            background-color: var(--primary-color);
            color: var(--text-light);
            border: 2px solid var(--text-light);
            border-radius: 40px;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
            display: inline-block;
        }

        .more-button:hover {
            background-color: var(--text-light);
            color: var(--primary-color);
            border-color: var(--text-light);
        }

        .back-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        hr {
            border: 0;
            height: 1px;
            background: var(--text-light);
            margin: 20px 0;
        }

        a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: var(--white);
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
            <?php flash('post_message'); ?>
            <h1>Terms & Conditions</h1>
            <a href="<?php echo URLROOT; ?>/posts/add" class="button">Add T&C</a>
            <?php foreach ($data['posts'] as $post): ?>
                <div>
                    <h4><?php echo $post->title; ?></h4>
                </div>
                <div>
                    Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
                </div>
                <p><?php echo $post->body; ?></p>
                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="more-button">More</a>
                <hr> <!-- Horizontal line to separate each data row -->
            <?php endforeach; ?>
        </div>
        <a href="<?php echo URLROOT; ?>/pages/home" class="button back-button">Back</a>
    </div>


</body>

</html>