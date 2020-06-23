<?php 

Class Fungsi{
    function PdfGenerator($html, $filename, $paper, $orientation = 'landscape')
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // Attachment digunakan untuk dapat melihat hasil yang akan di print
        $dompdf->stream($filename, array('Attachment' => 0));
    }
}    
?>