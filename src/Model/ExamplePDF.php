<?php

namespace Blog\Model;

class ExamplePDF extends \TCPDF
{
    /**
     * @param $orientation
     * @param $unit
     * @param $format
     * @param $unicode
     * @param $encoding
     * @param $diskcache
     * @param $pdfa
     */
    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
        // create new PDF document

// set document information
        $this->SetAuthor('Nicola Asuni');
        $this->SetTitle('TCPDF Example 001');

// set margins
        $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set font
        $this->SetFont('dejavusans', '', 14, '', true);

// Add a page
        $this->AddPage();

// Write text
        $this->Cell(0, 0, 'TEST CELL STRETCH: no stretch', 1, 1, 'C', 0, '', 0);

    }
}