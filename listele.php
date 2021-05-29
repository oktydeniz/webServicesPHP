<?php
include("index.php");
class kullanici{
   public $id ="";
   public $isim = "";
   public $soyad="";
}
$kl = new kullanici();

$bak = mysqli_query($baglan,"select * from kullanici");
$deger=mysqli_num_rows($bak);
$sayac =0;
echo("[");
while($goster = mysqli_fetch_assoc($bak)){
    $sayac+=1;
    $kl->id=$goster["id"];
    $kl->isim=$goster["isim"];
    $kl->soyad=$goster["soyad"];
    echo(json_encode($kl));
    if($sayac!=$deger){
        echo(",");
        
    }
}
echo("]");

?>