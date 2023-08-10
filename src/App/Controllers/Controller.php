<?php

namespace Hrach\Cloudfinder\App\Controllers;

abstract class Controller
{
    public function preview($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}