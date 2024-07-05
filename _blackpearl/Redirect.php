<?php

namespace Framework\BlackPearl;

class Redirect
{
    public static function to($route)
    {
        header("Location: $route");
    }
}