<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- ↓クリップボード操作のために使用するjsを読み込む　( https://clipboardjs.com/ ) -->
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js"></script>
    
    <script>
    var clipboard = new Clipboard('#copyTarget');    //clipboard.min.jsが動作する要素をクラス名で指定
    
    //クリックしたときの挙動
    $(function(){
        $('#copyTarget').click(function(){
            $(this).addClass('copied');    //ボタンの色などを変更するためにクラスを追加
            $(this).text('コピーしました');    //テキストの書き換え
        });
    });
    <title>タグ発行画面</title>
</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>タグ発行</h1>
            </div>
        </header>
    </div>
    <hr>
    <div class="tag">
        <div class="sample-box-1" id="copyTarget"><p>http://localhost/tag/{{$id}}</p></div>
        <div class="click"><button onclick="copyToClipboard()">Copy text</button></div>    
    </div>
    <div class="tag">
        <div class="sample-box-2">&lt;div id="TagMane"&gt;&lt;/div&gt;</div>
        <div class="click" id="copyTarget"><button onclick="copyToClipboard()">Copy text</button></div>
    </div>

</body>
</html>