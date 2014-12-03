<?php

/**
 * This handler is called by an ajax request which passes params that
 * includes a list of pdf files to concatenate.  Download is the default
 * return option for now.
 */

// Require php script
require_once '../PDFMerger/PDFMerger.php';

// Test for post var of pdfs to concatenate
if(isset($_POST['pdfs'])) {
  $items = $_POST['pdfs'];
  foreach($items as $item) {

  }
}

//$items = json_encode($_POST['pdfs']);
$timestamp = time();
$mergedPDF = $timestamp.'.pdf';
$pdfDir = '/Applications/XAMPP/xamppfiles/htdocs/sites/phpconcat/public_html/files/pdf/';
$downloadURL = 'http://'.$_SERVER["SERVER_NAME"].'/files/merged/'.$mergedPDF;
$downloadAbPath = '/Applications/XAMPP/xamppfiles/htdocs/sites/phpconcat/public_html/files/merged/'.$mergedPDF;

// New Instance
$pdf = new PDFMerger;
$pdf->addPDF($pdfDir.'bally.pdf', 'all')->addPDF($pdfDir.'bike.pdf', 'all')->merge('file', $downloadAbPath);

echo $downloadURL;

exit();