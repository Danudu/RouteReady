<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bank Details</title>
</head>
<body>
    <h2>Add Bank Details</h2>
    <form method="post" action="">

    <label for="driver_id">Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id" required><br><br>

        <label for="accountNo">Account Number:</label>
        <input type="text" id="accountNo" name="accountNo" required><br><br>

        <label for="bankName">Bank Name:</label>
        <input type="text" id="bankName" name="bankName" required><br><br>

        <label for="branchName">Branch Name:</label>
        <input type="text" id="branchName" name="branchName" required><br><br>

        <label for="holdersName">Holder's Name:</label>
        <input type="text" id="holdersName" name="holdersName" required><br><br>

        <input type="submit" value="Add Bank Details">

        
        <a href="<?php echo URLROOT; ?>/banks/edit/<?php echo $bank->bankID; ?>">Edit</a>
                   
                </td>
    </form>
</body>
</html>
