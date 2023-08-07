<?php
namespace Hrach\Cloudfinder;

class Main
{
    public static function start()
    {
        $data = new CloudFinder();
        $data->view();
        if(isset($_GET['request'])){
            $requestCode = new RequestCode($_GET['code']);
            $requestCode->requestConfirmationCode();
        }
    }
}