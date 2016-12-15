<?php


class Render
{
    public static function view($viewName)
    {
        return plugin_dir_path(__FILE__) . "views/{$viewName}.php";
    }
}