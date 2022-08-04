<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>タグ登録画面</title>
</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>タグ登録</h1>
            </div>
        </header>
    </div>
    <hr>
    <div id="form">
        <form action="http://localhost/TagRegistration" method="post" enctype="multipart/form-data">
            <div class="form-group">    
                @csrf
                <div class="data">
                    <p>テキスト<textarea name="many_text" rows="4" cols="40">cols="40"のテキストエリアです。</textarea>
                </div>
                <div class="data">
                    <p>URL <input type="url" name="url_text" required></p>
                </div>
            </div>

            <div>
                <input type="submit" value="登録する">
            </div>
        </form>
    </div>
</body>
</html>