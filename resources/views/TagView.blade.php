window.onload = function(){
    try{
        //var ajax_url_true = "http://localhost/tag/" + 1 + "/js/true"
        //var ajax_url_error = "http://localhost/tag/" + 1 + "/js/error"
        var style = '';
        @php
            if ($flag == 1){
        @endphp       
        style = `<style>
            .related__item {
                list-style-type: none;
                width 100%;
                display: grid;
                grid-template-rows: 100px 50px;
                grid-template-columns: 150px 1fr;
                margin-bottom 30px:
            }
            #grid_img{
                grid-row: 1 / 3;
                grid-column: 1 / 2;
                background: #f88;
            }
            #grid_h3{
                color: green;
                grid-row: 1 / 2;
                grid-column: 2 / 3;
                background-color: #8f8;
            }
            #grid_p{
                grid-row: 2 / 3;
                grid-column: 2 / 3;
                background-color: #88f;
            }
            </style>`;
        
        @php
            }else{
        @endphp
        style = `<style>
            .related__item {
                list-style-type: none;
                width 100%;
                display: grid;
                grid-template-rows: 100px 50px;
                grid-template-columns: 1fr 150px;
            }
            #grid_img{
                grid-row: 1 / 3;
                grid-column: 2 / 3;
                background: #f88;
            }
            #grid_h3{
                color: green;
                grid-row: 1 / 2;
                grid-column: 1 / 2;
                background-color: brown;
            }
            #grid_p{
                grid-row: 2 / 3;
                grid-column: 1 / 2;
                background: #88f;
            }
            </style>`;

        @php
            }
        @endphp
        document.querySelector(`head`).insertAdjacentHTML('beforeend', style);
        document.getElementById("TagMane").innerHTML = @json($text);
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
 