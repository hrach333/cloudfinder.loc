<?php

namespace Hrach\Cloudfinder\App\Controllers;
use Hrach\Cloudfinder\App\Models\FilesModel;
use Symfony\Component\Routing\RouteCollection;
class MainController extends Controller
{
    private $disk;
    public function __construct()
    {
        $disk = 'y0_AgAAAAAFDlKtAApP-QAAAADpzsWT1hnBThQlSVS2lZvo-SSBpg3iYh8';
    }

    public function indexAction(RouteCollection $routes)
    {
        $title = "Список файлов";
        $fileModel = new FilesModel();
        $contents = $fileModel->getAllFiles();

        //создаем массив с нужными данными
        $var = array();
        $i = 0;
        foreach ($contents as $content) {
           // $this->preview($content);
            foreach ($content as $key => $value) {

                    if ($key == 'public_url' || $key == 'name' || $key == 'size' || $key == 'mime_type' || $key == 'visibility'||
                        $key == 'extension' || $key == 'filename' || 'type')  {
                        //echo $key . " = " . $content[$key] . "<br>";
                        $var[$i][$key] = $value;
                    }

            }
            $i++;
        }
        //сортировка где папка идет первым остальное после
        usort($var, function($a, $b)
        {
            if ($a['type'] == $b['type']) return 0;         // Если значения совпадают, usort ожидает 0
            if ($a['type'] == "dir") return -1;
            if ($b['type'] == "dir") return 1;
            return strcmp($a, $b);
        });
        //$this->preview($var);
        require_once APP_ROOT . '/views/home.php';
    }


}