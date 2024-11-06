<?php
class Controller
{
    protected function view($filename = '', $data = [])
    {
        require_once(__DIR__ . '/../views/' . $filename . '.php');
    }
}?>