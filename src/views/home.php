<?php
require 'templates/head.php';
?>

    <body>
<input type="file" multiple id="js-file">

<div id="result">

</div>


<table class="table_file">

    <tr>
        <th>Имя</th>
        <th>Размер</th>
        <th>Mime Type</th>
        <th>Type</th>
    </tr>

    <?php foreach ($var as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= isset($item['size']) ? $item['size'] : "" ?></td>
            <td><?= isset($item['mime_type']) ? $item['mime_type'] : "" ?></td>
            <td><?= isset($item['type']) ? $item['type'] : "" ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $("#js-file").change(function () {
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
            $.each($("#js-file")[0].files, function (key, input) {
                formData.append('file[]', input);
            });

            $.ajax({
                type: "POST",
                url: '/upload',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $('#result').append("test");
                    alert("test");
                    console.log("test");
                    data.forEach(function (msg) {
                        $('#result').append(msg);
                    });
                }
            });
        }
    });
</script>
<?php

require 'templates/footer.php';