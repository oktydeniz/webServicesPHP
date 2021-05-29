<?php

include("index.php");

    
$baslik= $_POST["baslik"];
$resim = $_POST["image"];
$yol = "resimlerim/$baslik.jpg";
$ekle = mysqli_query($baglan,"insert into resimler(resimadi,resimyolu) values ('$baslik','$yol')");

if($ekle){
    
    file_put_contents($yol,base64_decode($resim));
    echo(json_encode(array('result'=>'Resim Eklendi')));
}else{
    echo(json_encode(array('result'=>'Hata !')));
} 
    



?>