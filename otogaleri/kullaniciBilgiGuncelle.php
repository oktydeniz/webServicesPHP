<?php
include("ayar.php");

$uye_id =$_GET["uye_id"];
$kullanici_adi =$_GET["kullanici_adi"];
$kullanici_sifre =$_GET["kullanici_sifre"];

class Result{
    public $tf;
}
$rslt = new Result();
$sorgu = mysqli_query($baglan,"update otoGaleriUyeler set kullanici_adi='$kullanici_adi',kullanici_sifre='$kullanici_sifre' where id='$uye_id'");
$rslt->tf=true;
echo(json_encode($rslt));

?>