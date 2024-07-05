<?php

namespace Framework\BlackPearl;

use VStelmakh\UrlHighlight\UrlHighlight;

class WithUrl
{
    public static function highlight($string)
    {
        require 'vendor/autoload.php';
        $urlHighlight = new UrlHighlight();
        return $urlHighlight->highlightUrls($string);
    }
}