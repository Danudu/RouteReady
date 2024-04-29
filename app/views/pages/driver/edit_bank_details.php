<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bank Details</title>
</head>
<body>
    <h2>Edit Bank Details</h2>
    <form action="<?php echo URLROOT; ?>/drivers/editBankDetails" method="post">
        <div>
            <label for="accountNo">Account Number:</label>
            <input type="text" id="accountNo" name="accountNo" value="<?php echo $data['bankDetails']->accountNo; ?>">
        </div>
        <div>
            <label for="bankName">Bank Name:</label>
            <input type="text" id="bankName" name="bankName" value="<?php echo $data['bankDetails']->bankName; ?>">
        </div>
        <div>
            <label for="branchName">Branch Name:</label>
            <input type="text" id="branchName" name="branchName" value="<?php echo $data['bankDetails']->branchName; ?>">
        </div>
        <div>
            <label for="holdersName">Account Holder's Name:</label>
            <input type="text" id="holdersName" name="holdersName" value="<?php echo $data['bankDetails']->holdersName; ?>">
        </div>
        <button type="submit">Update Bank Details</button>
    </form>
</body>
</html>
