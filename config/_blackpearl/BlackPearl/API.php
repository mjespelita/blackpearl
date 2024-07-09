<?php

namespace Framework\BlackPearl;

class API {
    public static function json($resource)
    {
        // Set content type to JSON
        header('Content-Type: application/json');

        return json_encode($resource);
    }

    public static function response($resource)
    {
        return json_encode($resource);
    }
}