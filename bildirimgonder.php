<?PHP
include("index.php");
$ad = $_POST["isim"];
$soyad = $_POST["soyisim"];
$code = rand(10000,100000);
$ekle = mysqli_query($baglan,"insert into bildirimler (isim,soyisim,dogrulama) values('$ad','$soyad','$code')");
if($ekle){
    function sendMessage($gelen) {
    $content      = array(
        "en" => "Üyeliği Aktif Etmek İçin Kod : $gelen "
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
        'app_id' => "39ae49b3-c9d0-4b36-9231-a576a94a14bd",
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
        'Authorization: Basic YWFjYWY0MGItMzdlYy00MTc3LWIwOTMtMGM3MzZhM2EwYTkx'
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

$response = sendMessage($code);
$return["allresponses"] = $response;
$return = json_encode($return);
@header('location:http://denizdenz.tk/codesend.php');
$data = json_decode($response, true);
print_r($data);
$id = $data['id'];
print_r($id);

print("\n\nJSON received:\n");
print($return);
print("\n");

}

?>