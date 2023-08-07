<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-token-with-polyfills-latest.js"></script>
    <script>
        YaSendSuggestToken(
            'https://examplesite.com/welcom.php', {
                flag: true
            }
        )
    </script>
</head>

<body>

</body>

</html>
<?php

echo "Все авторизованны <br>";
echo "Добро пожаловать";
