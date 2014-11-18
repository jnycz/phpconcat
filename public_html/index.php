<?php
include 'PDFMerger/PDFMerger.php';

$pdf = new PDFMerger;

$pdf->addPDF('PDFMerger/samplepdfs/one.pdf', '1, 3, 4')
  ->addPDF('PDFMerger/samplepdfs/two.pdf', '1-2')
  ->addPDF('PDFMerger/samplepdfs/three.pdf', 'all')
  ->merge('download', 'PDFMerger/samplepdfs/merged/TEST2.pdf');

//REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
//You do not need to give a file path for browser, string, or download - just the name.
