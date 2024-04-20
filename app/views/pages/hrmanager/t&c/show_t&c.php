<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show T&C | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">
</head>
<body>
    <a href="<?php echo URLROOT; ?>/posts/terms">Back</a>

    <h1><?php echo $data['post']->title; ?></h1>

    <div>
        Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->date; ?>
    </div>

    <p><?php echo $data['post']->body; ?></p>

    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
        <hr>
        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">Edit</a>

        <form class="" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
            <input type="submit" value="Delete">
        </form>
    <?php endif; ?>

    
</body>
</html>