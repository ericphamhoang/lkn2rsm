<?php
/**
 * Created by PhpStorm.
 * User: nikon_000
 * Date: 1/19/2017
 * Time: 11:39 AM
 */

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config.php';

global $twig;

$html = $twig->render('default.twig', array(
    'style' => file_get_contents(__DIR__ . '/../assets/css/app.css')
));

$fileName = __DIR__ . '/../output/wow';

file_put_contents($fileName . ".html", $html);

$pdf = new \mikehaertl\wkhtmlto\Pdf($fileName . '.html');

$pdf->binary = __DIR__ . '/../wkhtmltopdf/bin/wkhtmltopdf.exe';

if (!$pdf->saveAs($fileName . '.pdf')) {
    echo $pdf->getError();
}

?>
    <body>
    <link rel="stylesheet" href="../assets/css/app.css">
    <section>
        <a class="waves-effect waves-light btn" href="../output/wow.pdf" download="wow.pdf">Download</a>
    </section>
    </body>
<?php
