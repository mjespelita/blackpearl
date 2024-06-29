<?php

namespace Framework\BlackPearl;

use Picqer\Barcode\BarcodeGeneratorHTML;

class BarCode
{
    public static function generate($data)
    {
        require 'vendor/autoload.php';
        $generator = new BarcodeGeneratorHTML();
        return $generator->getBarcode($data, $generator::TYPE_CODE_128);
    }
}