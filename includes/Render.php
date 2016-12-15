<?php


class Render
{
    public function view($viewName)
    {
        return "../views/{$viewName}.php";
    }
}