<!-- pages/driver/view_bank_details.php -->

<!-- Display Bank Details -->
<h2>Bank Details</h2>
<ul>
    <li><strong>Account Number:</strong> <?php echo $data['bankDetails']->accountNo; ?></li>
    <li><strong>Bank Name:</strong> <?php echo $data['bankDetails']->bankName; ?></li>
    <li><strong>Branch Name:</strong> <?php echo $data['bankDetails']->branchName; ?></li>
    <li><strong>Account Holder's Name:</strong> <?php echo $data['bankDetails']->holdersName; ?></li>
</ul>

<!-- Edit Button -->
<a href="<?php echo URLROOT; ?>/drivers/editBankDetails" class="btn btn-primary">Edit Bank Details</a>
