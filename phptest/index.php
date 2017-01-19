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

$html = $twig->render('default.twig', array());

$fileName = __DIR__.'/../output/wow'.time();

file_put_contents($fileName.".html", $html);

echo "wkhtmltopdf $fileName.html $fileName.pdf";