<?php

include("index.php");

$id=$_GET["id"];
class bilgiler{
    public $kul_isim;
    public $kul_yas;
    public $kul_okul;
    public $kul_resim;
    public $kul_mail;
}
$uye_bilgi = new bilgiler();
$kontrol = mysqli_query($baglan,"select * from uyeler_bilgi where id='$id'");

while($data=mysqli_fetch_assoc($kontrol)){
    $uye_bilgi->kul_isim = $data["kul_isim"];
    $uye_bilgi->kul_yas = $data["kul_yas"];
    $uye_bilgi->kul_okul = $data["kul_okul"];
    $uye_bilgi->kul_resim = $data["kul_resim"];
    $uye_bilgi->kul_mail = $data["kul_mail"];
    
    echo(json_encode($uye_bilgi));
}




?>