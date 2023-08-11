<?php

namespace Hrach\Cloudfinder\App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class OperationFileController
{
    public function  uploadAction(RouteCollection $routes)
    {

        $uploadDir = './uploads/';

        $uploadFile = $uploadDir . basename($_FILES['file']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Ошибка во время загрузки!\n";
        }

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);

        print "</pre>";


    }

}