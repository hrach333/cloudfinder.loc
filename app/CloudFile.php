<?php

namespace Hrach\Cloudfinder;

class CloudFile
{
    private $data;
    public function __construct()
    {
        // initialize
    }

    public function getData()
    {
        //получение файлов и папок
        return $this->data = array("name" => "test");
    }
}
