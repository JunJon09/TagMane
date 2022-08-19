<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">

    <script language="javascript" type="text/javascript">
        //追加ボタン
        var table_tab = document.getElementsByClassName("form-table");
        function BtnAddClick() {
            //要素数
            var add_table = table_tab.length + 1;
            //追加する要素の文字列
            var elem = "<table class='form-table' id='form-" + add_table + "'>";
            elem += "<tbody>  <th class='number'>" + add_table + "</th>";
            elem += "<tr> <th>URL</th> <td> <input type='url' name='url_text[]'> </td> </tr>";
            elem += "<tr> <th>見出し</th> <td>  <input type='text' name='headline_text[]'> </td> </tr>";
            elem += "<tr> <th>あらすじ</th> <td> <textarea name='sub_text[]' rows='5' style='width: 100%;  box-sizing: border-box;'></textarea> </td> </tr>";
            elem += "<tr> <th>イメージ画像</th> <td> <input type='file' name='img_file[]'> </td> </tr> </tbody> </table>";
            var table_id = document.getElementById("dvContentArea");
            table_id.insertAdjacentHTML('beforeend', elem);
           
        }
        //削除ボタン
        function BtnDelClick() {
            var del_table = table_tab.length;
            console.log(del_table);
            if (del_table<= 1)return;
            var del_id = "form-" + del_table;
            var del = document.getElementById(del_id); 
            del.remove();
            console.log("aa");
        }
    </script>
    <title>タグ登録画面</title>
</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>タグ登録</h1>
                    <a href="http://localhost/logout">ログアウト</a>
                    <a href="http://localhost/dashboard">トップページ</a>
            </div>
        </header>
    </div>
    <hr>
        <form action="http://localhost/TagRegistration" method="post" enctype="multipart/form-data" >
            @csrf
            <div>
                <h2>スタイルの種類を選択してください。</h2>
                <input type="text" name="style_select" size="20" list="mylist1">
                <datalist id="mylist1">
                <option>1</option>
                <option>2</option>
                </datalist>
            </div>
            <div id = "dvContentArea">
                <h2>
                    入稿してください
                </h2>
                <table>

                </table>
                <table class="form-table" id="form-1">
                    <tbody>
                        <th class="number">
                            1
                        </th>
                        <tr>
                            <th>URL</th>
                            <td>
                                <input type="url" name="url_text[]">
                            </td>
                        </tr>
                        <tr>
                            <th>見出し</th>
                            <td>
                                <input type="text" name="headline_text[]">
                            </td>
                        </tr>
                        <tr>
                            <th>あらすじ</th>
                            <td>
                                <textarea name="sub_text[]" rows="5" style="width: 100%;  box-sizing: border-box;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>イメージ画像</th>
                            <td>
                                <input type="file" name="img_file[]">
                            </td>
                        </tr>
                    </tbody>     
                </table>
            </div>
            
            <div>
                <input type="button" id="btnAdd" value="追加" onclick="BtnAddClick();">
                <input type="button" id="btnDel" value="削除" onclick="BtnDelClick();">
            </div>
            <div>
                <input type="submit" name="a"value="登録する">
            </div>
        </form>
</body>
</html>