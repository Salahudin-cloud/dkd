<?php

use Dompdf\Dompdf;

function generate_pdf($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = 'portrait')
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    $dompdf->setPaper($paper, $orientation);

    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename . '.pdf', ['Attachment' => 0]);
    } else {
        return $dompdf->output();
    }
}


