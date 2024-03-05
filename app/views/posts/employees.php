<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="<?php echo URLROOT; ?>/pages/home">Back</a>
    <?php flash('post_message'); ?>
    <div>
        <h1>Employees</h1>
    </div>
    <div>
        <a href="<?php echo URLROOT; ?>/posts/add">Add Employee</a>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div>
            <h4><?php echo $post->title; ?></h4>
        </div>
        <div>
            Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
        </div>
        <p><?php echo $post->body; ?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
    <?php endforeach; ?>
    
</body>
</html>

