<?php
include("ayar.php");

$ad =$_POST["k_adi"];
$sifre =$_POST["k_sifre"];

class Uye{
    public $id;
    public $kullanici_adi;

}
$uye = new Uye();
$komut = mysqli_fetch_assoc(mysqli_query($baglan,"select * from otoGaleriUyeler  where kullanici_adi ='$ad' and  kullanici_sifre='$sifre' and durum='1'"));

$uye->id=$komut["id"];
$uye->kullanici_adi=$komut["kullanici_adi"];


echo(json_encode($uye));

?>

