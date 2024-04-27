<?php
require_once '../libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Fetch the HTML content
$html = file_get_contents('hrmanager/payments.php');

// Create a new Dompdf instance
$dompdf = new Dompdf();

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation (optional)
$dompdf->setPaper('A4', 'portrait');

// Render PDF (optional)
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('view_payments.pdf', array('Attachment' => 0));
