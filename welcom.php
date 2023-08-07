<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFinder</title>
    <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-with-polyfills-latest.js"></script>
    


</head>

<body>
    <div>
        Главная страница.
        Это тестовое страница для тех кто вошел
    </div>
</body>

</html>
<?php
$post_data = build_data_files($boundary, $fields, $files);
$post_data = "
POST /token HTTP/1.1
Host: https://oauth.yandex.ru/
Content-type: application/x-www-form-urlencoded
Content-Length: <длина тела запроса>
[Authorization: Basic <закодированная методом base64 строка `client_id:client_secret`>]

   grant_type=authorization_code
 & code=<код подтверждения>
[& client_id=<идентификатор приложения>]
[& client_secret=<секретный ключ>]
[& device_id=<идентификатор устройства>]
[& device_name=<имя устройства>]
";
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    #CURLOPT_VERBOSE => true,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $post_data,
    CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=" . $delimiter,
        "Content-Length: " . strlen($post_data),
    ),
));

$response = curl_exec($curl);

$info = curl_getinfo($curl);
//echo "code: ${info['http_code']}\n";
//var_dump($response);
$json = json_decode($response);
var_dump($json);
//echo $json->body;
curl_close($curl);

function build_data_files($boundary, $fields, $files)
{
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content)
    {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }

    foreach ($files as $name => $content)
    {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
            . 'Content-Type: image/jpeg'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;

        $data .= $eol;
        $data .= $content . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;
    return $data;
}