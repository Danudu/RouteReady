<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More Details</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .editbutton, .deletebutton {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>More Details</h2>

<?php if (isset($vehicle_details)): ?>
    <table>
        <?php 
        // Get custom column names from the Vehicle class
        $custom_column_names = (new Vehicle())->getCustomColumnNames();
        
        foreach ($vehicle_details as $column_name => $value): ?>
            <tr>
                <th><?php echo isset($custom_column_names[$column_name]) ? $custom_column_names[$column_name] : $column_name; ?></th>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
   
<?php else: ?>
    <p>No results found for registration number: <?php echo $reg_no; ?></p>
<?php endif; ?>

</body>
</html>
