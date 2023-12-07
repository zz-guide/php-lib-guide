<?php
/**
 *
 * @author:  leixu
 * @version: 1.5.0
 * @change:
 *    1. 2019/11/11 leixu: 创建；
 */


use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

require_once './vendor/autoload.php';

ini_set("display_errors", "On");
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

class CommonTest
{
    public function run()
    {
        $logoUrl = './zhiniu-logo.png';
        header("Content-type:image/png");

        header ( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        $qr = new QrCode('121212');
        echo $qr->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH)
            ->setSize(300)
            ->setLogoPath($logoUrl)
            ->setLogoWidth(80)
            ->writeString();
    }
}

$task = new CommonTest();
$task->run();