<!-- drivers/add_bank_details.php -->

<!-- Add Bank Details Form -->
<form action="<?php echo URLROOT; ?>/drivers/addBankDetails" method="post">
    <div class="form-group">
        <label for="accountNo">Account Number:</label>
        <input type="text" name="accountNo" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="bankName">Bank Name:</label>
        <input type="text" name="bankName" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="branchName">Branch Name:</label>
        <input type="text" name="branchName" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="holdersName">Account Holder's Name:</label>
        <input type="text" name="holdersName" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Bank Details</button>
</form>
