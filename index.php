<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    <div>
        Главная страница.
        
        <a href="https://oauth.yandex.ru/authorize?response_type=code&client_id=75f20864d6ac448eb95c165d8974fc62&redirect_uri=https://cloudfinder.loc/?request=true&force_confirm=yes">Войти</a>
    </div>
<?php
Hrach\Cloudfinder\Main::start();
?>
</body>

</html>