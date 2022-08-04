<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>タグ発行画面</title>
    <!-- コピーの実装 -->
    <script>
        function copy($id) {
            // ↓ Rangeオブジェクト作成
            let range = document.createRange();
            // ↓ コピーする要素を取得
            let copyTarget = document.getElementById($id);
            // ↓ #copyの要素全体を選択
            range.selectNodeContents(copyTarget);
            // ↓ 選択した要素(ノード)の文字列を取得(selectionオブジェクトを取得)
            let selection = document.getSelection();
            // ↓ 選択した範囲を解除(これがないと次のaddRangeが上手く動かない)
            selection.removeAllRanges();
            // ↓ selectionオブジェクトにrangeオブジェクトを追加
            selection.addRange(range);

            document.execCommand("copy");// クリップボードにコピー
            selection.removeAllRanges();// テキスト選択を解除
        }
    </script>
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
        <div class="sample-box-1" id="copy_tag">&lt;script src="http://localhost/tag/{{$id}}"&gt;&lt;/script&gt;</div>
        <div class="click"><button onclick="copy('copy_tag')">Copy</button></div>    
    </div>
    <div class="tag">
        <div class="sample-box-2" id="copy_url">&lt;div id="TagMane"&gt;&lt;/div&gt;</div>
        <div class="click"><button onclick="copy('copy_url')">Copy</button></div>
    </div>

</body>
</html>