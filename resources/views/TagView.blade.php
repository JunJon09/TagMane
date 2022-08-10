window.onload = function(){
    try{
        var ajax_url_true = "http://localhost/tag/" + {{$id}} + "/js/true"
        var ajax_url_error = "http://localhost/tag/" + {{$id}} + "/js/error"
        var data = @json(($text));
        var script = document.createElement("script")
        script.type = "text/javascript";
        script.src = data;
        document.body.appendChild(script);
        var img_text = "<img src=http://localhost/tag/{{$id}}/trigger style='display:none' onclick='click();'>";

        document.getElementById("TagMane").innerHTML = img_text;
    }catch (e) {
        console.log( e.message );
        $.ajax({
            headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }, 
            url: ajax_url_error, //通信先アドレスで、このURLをあとでルートで設定します
            method: 'GET', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
        },)

    }
}
 