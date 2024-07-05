<?php

namespace Framework\BlackPearl;

use chillerlan\QRCode\QRCode as QRCodeGenerator;

class QRCode
{
    public static function generateQRCode($data)
    {
        require 'vendor/autoload.php';
        return (new QRCodeGenerator())->render($data);
    }
}