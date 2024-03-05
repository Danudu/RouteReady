<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="<?php echo URLROOT; ?>/posts/employees">Back</a>
    <h2>Edit</h2>
    <p>Edit employee using this form</p>
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="POST">
        <label for="title">Title: </label>
        <input type="title" name="title" value="<?php echo $data['title']; ?>">
        <span><?php echo $data['title_err'];?></span>
        
        <label for="body">Body: </label>
        <input type="body" name="body" value="<?php echo $data['body']; ?>">
        <span><?php echo $data['body_err'];?></span>

        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
