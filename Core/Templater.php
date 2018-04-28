<?php

namespace Core;

class Templater
{
    public static function build($template, array $params)
    {
        ob_start();
        extract($params);
        include_once ('Templates/'.$template);
        return ob_get_clean();
    }
}