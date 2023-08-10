<?php

namespace Hrach\Cloudfinder\App\Models;

use Arhitector\Yandex\Disk;
use Arhitector\Yandex\Disk\Adapter\Flysystem;
use League\Flysystem\Filesystem;

class FilesModel
{
    public function getAllFiles()
    {
        $client = new Disk('y0_AgAAAAAFDlKtAApP-QAAAADpzsWT1hnBThQlSVS2lZvo-SSBpg3iYh8');
        $adapter = new Flysystem($client);
        // create Filesystem
        $filesystem = new Filesystem($adapter);

        // and use
        $contents = $filesystem->listContents();
        //preview($contents);

        return $contents;
    }
}