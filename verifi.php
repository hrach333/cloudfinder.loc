<?php
session_start();
require './vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
//echo $_SERVER['REQUEST_URI'];
Hrach\Cloudfinder\Main::start();
?>
</body>

</html>
