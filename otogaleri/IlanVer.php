<?php

include ("ayar.php");

$uye_id =$_POST["uye_id"];
$sehir = $_POST["sehir"];
$ilce = $_POST["ilce"];

$mahalle = $_POST["mahalle"];
$marka =   $_POST["marka"];
$seri =    $_POST["seri"];

$model =   $_POST["model"];
$yil = $_POST["yil"];
$ilantipi = $_POST["ilantipi"];

$kimden = $_POST["kimden"];
$baslik = $_POST["baslik"];
$aciklama = $_POST["aciklama"];

$motortipi = $_POST["motortipi"];
$motorhacmi = $_POST["motorhacmi"];
$surat = $_POST["surat"];

$yakittipi = $_POST["yakittipi"];
$ortalamayakit = $_POST["ortalamayakit"];
$depolamahacmi = $_POST["depolamahacmi"];
$km = $_POST["km"];
$ucret = $_POST["ucret"];

class Result{

    public $uye_id;
    public $ilan_id;
    public $tf;
}

$result = new Result();

$ekle = mysqli_query($baglan,"insert into  otoGaleriIlanlar (uye_id,sehir,ilce,mahalle,marka,seri,model,yil,ilantipi,kimden,baslik,aciklama,motortipi,motorhacmi,surat,yakittipi,ortalamayakit,depohacmi,km,ucret) 
values ('$uye_id','$sehir','$ilce','$mahalle','$marka','$seri','$model','$yil','$ilantipi','$kimden','$baslik','$aciklama','$motortipi','$motorhacmi','$surat','$yakittipi','$ortalamayakit','$depolamahacmi','$km','$ucret')");



if($ekle){

    $sor = mysqli_query($baglan,"select * from  otoGaleriIlanlar where uye_id='$uye_id'  order by id desc limit 1");
    //sadece son kaydi alma
    $sor_2 = mysqli_fetch_assoc($sor);

    $result->uye_id = $uye_id;
    $result->tf = true;
    $result->ilan_id = $sor_2["id"];
    echo(json_encode($result));

}else{
    
    $result->tf = false;
    echo(json_encode($result));
}




?>