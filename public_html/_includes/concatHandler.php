<?php

/**
 * This handler is called by an ajax request which passes params that
 * includes a list of pdf files to concatenate.  Download is the default
 * return option for now.
 */

// Require php script
require_once '../PDFMerger/PDFMerger.php';

// Test for post var of pdfs to concatenate
//if(isset($_POST['pdfs'])) {

  //$items = json_encode($_POST['pdfs']);
  $timestamp = time();
  $mergedPDF = $timestamp.'.pdf';
  $pdfDir = '/Applications/XAMPP/xamppfiles/htdocs/sites/phpconcat/public_html/files/pdf/';
  $downloadURL = 'http://'.$_SERVER["SERVER_NAME"].'/files/merged&file='.$mergedPDF;

  // New Instance
  $pdf = new PDFMerger;

  $pdf->addPDF($pdfDir.'bally.pdf', 'all')
    ->addPDF($pdfDir.'bike.pdf', 'all')
    ->merge('download', $timestamp.'.pdf');

  // We'll be outputting a PDF
  header('Content-type: application/pdf');

  // It will be called downloaded.pdf
  header('Content-Disposition: attachment; filename="'.$timestamp.'.pdf"');

  // The PDF source is in original.pdf
  readfile('original.pdf');

//}

//REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
//You do not need to give a file path for browser, string, or download - just the name.




/*
 * NOTES
 * THis is working when I hit the php scripti directly.  WE need to return the url of the merged pdf
 * and display it in an iframe for the download to work.
 */
