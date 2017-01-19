<?php
/**
 * Created by PhpStorm.
 * User: nikon_000
 * Date: 1/19/2017
 * Time: 11:39 AM
 */

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../config.php';

// Create the GrabzItClient class
// Replace "APPLICATION KEY", "APPLICATION SECRET" with the values from your account!
$grabzIt = new GrabzItClient(API_KEY, API_VALUE);

$grabzIt->HTMLToPDF("WOW");

$grabzIt->SaveTo(__DIR__.'/../output/wow.pdf');