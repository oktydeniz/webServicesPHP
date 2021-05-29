<?php

include("index.php");

$mail = $_GET["mail"];
$code = $_GET["code"];
$kontrol = mysqli_query($baglan,"select * from ekleme where mail='$mail' and durum='0' and dogrulama='$code'");
$say = mysqli_num_rows($kontrol);
if($say>0){
    $guncelle = mysqli_query($baglan,"update ekleme set durum='1' where mail='$mail' and dogrulama='$code' ");
    if($guncelle){
        $json=(array('Result'=>true));
     echo json_encode($json);
    }
}else{
     $json=(array('Result'=>false));
     echo json_encode($json);
    
}

?>