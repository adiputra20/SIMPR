<?php
    use Dompdf\dompdf;
    require_once 'autoload.inc.php';

    $dompdf = new Dompdf();
    $html   = "
        <table>
            <thead>
                <tr>
                    <th>Header</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data</td>
                </tr>
            </tbody>
        </tablel>";
    
    $dompdf->loadhtml('<h1> TES PDF BOSKU</h1>');
    $dompdf->setPaper('A4', 'portait');
    $dompdf->render();
    ob_clean();
    $dompdf->stream('tesPDF.pdf', array("Attachment" => FALSE));
