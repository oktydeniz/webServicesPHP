<?php
include("ayar.php");
$uye_id =$_GET["uye_id"];

class Result{
    public $kullanici_adi;
    public $kullanici_sifre;
}
$result = new Result();
$sorgula = mysqli_query($baglan,"select kullanici_adi,kullanici_sifre from otoGaleriUyeler where id = '$uye_id'");
$atama = mysqli_fetch_assoc($sorgula);


$result->kullanici_adi=$atama["kullanici_adi"];
$result->kullanici_sifre =$atama["kullanici_sifre"];
echo(json_encode($result));


?>