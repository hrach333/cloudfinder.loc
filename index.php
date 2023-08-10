<?php

use Hrach\Cloudfinder\CloudFinder;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require './vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFinder</title>
</head>

<body>
<?php
function preview($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
Hrach\Cloudfinder\Main::start();
//$client = new Arhitector\Yandex\Client\OAuth('75f20864d6ac448eb95c165d8974fc62');
try {
//$disk = new Arhitector\Yandex\Disk('y0_AgAAAAAFDlKtAApP-QAAAADpzsWT1hnBThQlSVS2lZvo-SSBpg3iYh8');

$disk = new CloudFinder();
$disk->initDisk();

//$disk->setAccessToken('8362392d1cd3462d9dc44795d4e715e1');
/*
echo $disk->total_space, "<br>";
$collection = $disk->getResources();
echo "<pre>";
$file = $collection->getFirst();
echo $file->path;
echo "</pre>";
*/
} catch(Arhitector\Yandex\Client\Exception\UnauthorizedException $exc) {
   echo '<a href="https://oauth.yandex.ru/authorize?response_type=code&client_id=8362392d1cd3462d9dc44795d4e715e1"><img src="image/yandex_icon.svg"></a>';
}
//$collection = $disk->getResources();
//print_r($disk->toArray());
?>

<a href="https://cloudfinder.loc/?view_all_files=true">test</a>
</body>

</html>