<?php
include("index.php");


$ad = $_POST["isim"];
$soyad=$_POST["soyad"];

$ekle = mysqli_query($baglan,"insert into kullanici (isim,soyad) values('$ad','$soyad')");
if(ekle){
    $json=(array('Result'=>'Ekleme Basarili'));
    echo json_encode($json);
}else{
    echo("Hata");
}


?>