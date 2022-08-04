console.log("Hello World");
window.onload = function(){
    $text = "<a href='{{$url}}'>{{$text}}</a>";
    $img_text = "<img src=http://localhost/tag/{{$id}}/trigger style='display:none' onclick='click();'>";
    $text += $img_text;
    document.getElementById("TagMane").innerHTML = $text;
    
}
 