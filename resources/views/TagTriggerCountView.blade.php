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
                <h1>ID:{{$id}}</h1>
            </div>
        </header>
    </div>
    <hr>

    <div class="tag">
        <div class="view-count"><p>ページに表示された回数は{{$view_count}}回です。</p></div>
    </div>
    <div class="tag">
        <div class="click-trigger"><p>クリックされた回数は{{$click_count}}回です。</p></div>
    </div>
    <div class="tag">
        <div class="js-trigger"><p>{{$message}}</p></div>
    </div>
    
   
    
</body>
</html>