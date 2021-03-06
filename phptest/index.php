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

$data = json_decode(file_get_contents(__DIR__ . '/../data/ericphamhoang.json'));

var_dump($data);

$html = $twig->render('default.twig', array(
    'style' => file_get_contents(__DIR__ . '/../assets/css/app.css'),
    'data' => $data
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
        <div class="container center-align">
            <iframe src="../output/wow.pdf" height="800px" width="100%"></iframe>
            <a class="waves-effect waves-light btn" href="../output/wow.pdf" download="wow.pdf">Download</a>
        </div>
    </section>
    </body>
<?php
