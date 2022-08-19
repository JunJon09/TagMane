<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$name}}さんのマイページ</h1>
    <a href="http://localhost/logout">ログアウト</a>
    <a href="http://localhost/dashboard">トップページ</a>
    <hr>
    <?php
    if (count($data) == 0){
    ?>
        <p>まだ入稿してないので見れません</p>
    <?php
    }else{
    ?>
    <ul>
    <?php
        for($i=0; $i<count($data); $i++){
    ?>
        <li>
            <a href="tag/<?php echo $data[$i];?>/trigger/view"> ID番号: <?php echo $data[$i]; ?> </a>
        </li>
    <?php
        }
        
    }
    ?>
    </ul>
</body>
</html>