<?php
include("index.php");

if($_POST){
    
$ad = $_POST["isim"];
$soyad=$_POST["soyad"];

$kontrol = mysqli_query($baglan," select * from kullanici where isim='$ad' and soyad='$soyad' ");
$kntrcount = mysqli_num_rows($kontrol);

if($kntrcount<1){
    
    $ekle = mysqli_query($baglan,"insert into kullanici (isim,soyad) values ('$ad','$soyad')");
    if($ekle){
        $json=(array('Result'=>'Ekleme Basarili'));
        echo json_encode($json);
    }
}
else{
     $json=(array('Result'=>'Kayıt Var '));
        echo json_encode($json);
}
}




?>