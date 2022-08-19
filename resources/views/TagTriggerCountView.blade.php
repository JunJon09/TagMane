<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>タグトリガーカウント画面</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="row">
                <h1>{{$name}}さんID:{{$id}}</h1>
                <a href="http://localhost/logout">ログアウト</a>
                <a href="http://localhost/dashboard">トップページ</a>
            </div>
        </header>
    </div>
    <hr>
    <div id="content">
        <?php
           for($i=0; $i<count($text); $i++){ 
        ?>
        <h2>{{$text[$i]}}の記事</h2>
        <div class="tag">
        <div class="view-count"><p>ページに表示された回数は{{$view_count[$i]}}回です。</p></div>
        </div>
        <div class="tag">
            <div class="click-trigger"><p>クリックされた回数は{{$click_count[$i]}}回です。</p></div>
        </div>
        <?php
            }
        ?>
    </div>
    
  
    
   
    
</body>
</html>