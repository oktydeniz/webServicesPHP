<?php

include("ayar.php");

//Butonun textini değiştirme işlemi 

$uye_id = $_GET["uye_id"];
$ilan_id = $_GET["ilan_id"];

class Result{
    public $tf;
    public $text;
}
$rslt = new Result();
$sorgu = mysqli_query($baglan,"select * from otoGaleriFavoriIlanlar where uye_id = '$uye_id' and ilan_id='$ilan_id'");

$sayi = mysqli_num_rows($sorgu);
if($sayi>0){
    $rslt->tf = true;
    $rslt->text = "Favoriden Çıkar";
    echo(json_encode($rslt));
}else{
    $rslt->tf = false;
    $rslt->text = "Favorilere Ekle";
    echo(json_encode($rslt));
}
?>