<?php

/**
 * This handler is called by an ajax request which passes params that
 * includes a list of pdf files to concatenate.  Download is the default
 * return option for now.
 */

// Require php script
require_once '../PDFMerger/PDFMerger.php';

// Test for post var of pdfs to concatenate
if(isset($_POST['pdfstring'])) {

  // New Instance
  $pdf = new PDFMerger;

  $pdf->addPDF('../PDFMerger/samplepdfs/one.pdf', '1, 3, 4')
    ->addPDF('../PDFMerger/samplepdfs/two.pdf', '1-2')
    ->addPDF('../PDFMerger/samplepdfs/three.pdf', 'all')
    ->merge('download', '../PDFMerger/samplepdfs/merged/TEST2.pdf');

}

//REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
//You do not need to give a file path for browser, string, or download - just the name.
