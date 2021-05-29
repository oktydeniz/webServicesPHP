<?php
include("ayar.php");
$ad =$_POST["kul_adi"];
$sifre =$_POST["kul_sifre"];
$dogrulamaKodu=rand(0,10000);
$durum =0;

class Result{
    public $result;
    public $tf;
    public $dkodu;
}
$rslt = new Result();

$kontrol = mysqli_query($baglan,"select * from otoGaleriUyeler where kullanici_adi='$ad'");

if(mysqli_num_rows($kontrol)<1){
    $komut = mysqli_query($baglan,"insert into otoGaleriUyeler (kullanici_adi,kullanici_sifre,dogrulama,durum) values ('$ad','$sifre','$dogrulamaKodu','$durum')");
    if($komut){
        $rslt->dkodu= $dogrulamaKodu;
        $rslt->tf = true;
        $rslt->result = "Kayıt Başarılı";
        echo(json_encode($rslt));
    }
}else{
    $rslt->result = "Böyle Bir Kayıt Var";
    $rslt->tf = false;
    echo(json_encode($rslt));
}


?>