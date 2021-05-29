<?php
include("index.php");

$code =$_POST["dogrulama"];
$mail =$_POST["mail"];

$kontrol = mysqli_query($baglan,"select * from bildirimKayitOl where mail='$mail' and durum='0' and dogrulama='$code'");

$number = mysqli_num_rows($kontrol);
if($number>0){
    $guncelle = mysqli_query($baglan,"update bildirimKayitOl set durum='1' where mail='$mail' and durum='0' and dogrulama='$code'");
    if($guncelle){
        $sonuc = "İşlem Tamamlandı";
        sendMessage($sonuc);
    }
    
}
else{
    $so = "İşlem Hatalı !";
    sendMessage($so);
        
}
function sendMessage($msg) {
    $content      = array(
        "en" => ''.$msg
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Like",
        "icon" => "http://i.imgur.com/N8SN8ZS.png",
        "url" => "https://yoursite.com"
    ));
    array_push($hashes_array, array(
        "id" => "like-button-2",
        "text" => "Like2",
        "icon" => "http://i.imgur.com/N8SN8ZS.png",
        "url" => "https://yoursite.com"
    ));
    $fields = array(
        'app_id' => "e4eda264-e241-4aba-b0ac-0d1a1aece246",
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'web_buttons' => $hashes_array
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ZDE1Y2Y2YmItZjlmZC00YWI5LTkzYjAtYTQ1YjI4OGFlMTI4'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}



?>