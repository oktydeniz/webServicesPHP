<?php
include("ayar.php");

class Result{
    public $tf;
    public $sonuc;
}

$rst = new Result();
$ilan_id =$_GET["ilan_id"];

$sil = mysqli_query($baglan,"delete from otoGaleriIlanlar where id ='$ilan_id'");
$sil_iki = mysqli_query($baglan,"delete from otoGaleriResimler where ilan_id ='$ilan_id'");
if ($sil && $sil_iki)
{
    $rst->tf = true;
    $rst->sonuc = "İlan Silindi";
    echo(json_encode($rst));
}else{
    $rst->tf = false;
    $rst->sonuc = "İlan Silinemedi";
    echo(json_encode($rst));
}

?>