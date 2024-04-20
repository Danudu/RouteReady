<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T&C | RouteReady</title>
    <link rel="icon" href="<?php echo URLROOT; ?>/img/logo.jpg" type="image/x-icon">

</head>
<body>
<a href="<?php echo URLROOT; ?>/pages/home">Back</a>
    <?php flash('post_message'); ?>
    <div>
        <h1>Terms & Conditions</h1>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div>
            <h4><?php echo $post->title; ?></h4>
        </div>
        <p><?php echo $post->body; ?></p>
    <?php endforeach; ?>
    
</body>
</html>