<?php

namespace Hrach\Cloudfinder;

class RequestCode 
{
    private $code;
    public function __construct($code)
    {
        $this->code = $code;//получаем от яндекса код
    }
    /**
     * Получаем код для авторизации OAuth-токен
     *
     * @return void
     */
    public function requestConfirmationCode()
    {
        
        $key_app = "75f20864d6ac448eb95c165d8974fc62";
        $secret_key = "5783562b341b4fc2b5f9ff49f5674ad1";
        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;
        $data = array(
            "grant_type"=>"authorization_code",
            "code"=>$this->code,
            "client_id"=>$key_app,
            "client_secret"=>$secret_key

        );
        $post_data = http_build_query($data);
        //echo $post_data;
        $lenth = strlen($post_data);
        //иницилизация curl
        $curl = curl_init("https://oauth.yandex.ru");
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-type: application/x-www-form-urlencoded; boundary=".$delimiter,
            "Content-Length: $lenth",
        ));
        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        echo "Выполнен curl запрос<br>";
        echo "<pre>";
        //var_dump($info);
        echo "</pre>";
        echo "<br>";
        var_dump($response);
        //$json = json_decode($response);
        //echo $json;
        curl_close($curl);
        
        /* 
        $post = "POST /token HTTP/1.1\r\n
        Host: https://oauth.yandex.ru/\r\n
        Content-type: application/x-www-form-urlencoded\r\n
        Content-Length: <длина тела запроса>
        [Authorization: Basic <закодированная методом base64 строка `client_id:client_secret`>]
        
        grant_type=authorization_code
        & code=<код подтверждения>
        [& client_id=<идентификатор приложения>]
        [& client_secret=<секретный ключ>]
        [& device_id=<идентификатор устройства>]
        [& device_name=<имя устройства>]";

        */
    }
}