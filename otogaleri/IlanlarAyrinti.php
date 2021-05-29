<?php

include("ayar.php");

$ilan_id = $_GET["ilan_id"];


$sorgu = mysqli_query($baglan,"select * from otoGaleriIlanlar where id = '$ilan_id'");

class Result{

    public $uye_id;
    public $sehir;
    public $ilce;
    public $mahalle;
    public $marka;
    public $seri;
    public $model;
    public $yil;
    public $ilantipi;
    public $kimden;
    public $baslik;
    public $aciklama;
    public $motortipi;
    public $motorhacmi;
    public $surat;
    public $yakittipi;
    public $ortalamayakit;
    public $depohacmi;
    public $km;
    public $ucret;
}

$sorguJson = mysqli_fetch_assoc($sorgu);
$rsljson   = new Result();

$rsljson->uye_id = $sorguJson["uye_id"];
$rsljson->sehir = $sorguJson["sehir"];
$rsljson->ilce = $sorguJson["ilce"];
$rsljson->mahalle = $sorguJson["mahalle"];
$rsljson->marka = $sorguJson["marka"];
$rsljson->seri = $sorguJson["seri"];
$rsljson->model = $sorguJson["model"];
$rsljson->yil = $sorguJson["yil"];
$rsljson->ilantipi = $sorguJson["ilantipi"];
$rsljson->kimden = $sorguJson["kimden"];
$rsljson->baslik = $sorguJson["baslik"];
$rsljson->aciklama = $sorguJson["aciklama"];
$rsljson->motorhacmi = $sorguJson["motorhacmi"];
$rsljson->motortipi = $sorguJson["motortipi"];
$rsljson->surat = $sorguJson["surat"];
$rsljson->yakittipi = $sorguJson["yakittipi"];
$rsljson->ortalamayakit = $sorguJson["ortalamayakit"];
$rsljson->depohacmi = $sorguJson["depohacmi"];
$rsljson->km = $sorguJson["km"];
$rsljson->ucret = $sorguJson["ucret"];
echo(json_encode($rsljson));
?>