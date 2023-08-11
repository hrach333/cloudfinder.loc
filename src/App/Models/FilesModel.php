<?php

namespace Hrach\Cloudfinder\App\Models;

use Arhitector\Yandex\Disk;
use Arhitector\Yandex\Disk\Adapter\Flysystem;
use League\Flysystem\Filesystem;

class FilesModel
{
    public function getAllFiles()
    {
        $client = new Disk(OAUTH);
        $adapter = new Flysystem($client);
        // create Filesystem
        $filesystem = new Filesystem($adapter);

        // and use
        $contents = $filesystem->listContents();
        //preview($contents);

        return $contents;
    }
}