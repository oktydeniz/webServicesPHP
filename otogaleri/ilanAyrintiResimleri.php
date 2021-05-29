<?php

include("ayar.php");

$ilan_id = $_GET["ilan_id"];


$sorgu = mysqli_query($baglan,"select * from otoGaleriResimler where ilan_id = '$ilan_id'");

class Result{
    public $resim;
}

$rslt = new Result();

$sayi = mysqli_num_rows($sorgu);
$sayac =0;

echo("[");
while($atama=mysqli_fetch_assoc($sorgu)){
    $sayac+=1;
    $rslt->resim = $atama["resimyolu"];
    echo(json_encode($rslt));
    if($sayi>$sayac){
        echo(",");
    }
}
echo("]");

?>