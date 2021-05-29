<?php
include("ayar.php");

$uye_id = $_GET["uye_id"];
$ilan_id = $_GET["ilan_id"];

class Result{
    public $tf;
    public $text;
}

$rslt = new Result();

$sorgu = mysqli_query($baglan,"select * from otoGaleriFavoriIlanlar where ilan_id = '$ilan_id' and uye_id='$uye_id'");

$sorguSonucu = mysqli_num_rows($sorgu);
//eğer varsa bu kayıt ve get işlemi yapılmışsa bu kullanıcı favorilerden 
//çıkarmak istiyordur. Bu nedenle kayıt Silinir.
if($sorguSonucu>0){
    $sil = mysqli_query($baglan,"delete from otoGaleriFavoriIlanlar where ilan_id = '$ilan_id' and uye_id='$uye_id'");
    if($sil){
        $rslt->tf=false;
        $rslt->text="Favoriden Çıkartıldı";
        echo(json_encode($rslt));
    }
}else{
    $ekle = mysqli_query($baglan,"insert into otoGaleriFavoriIlanlar(ilan_id,uye_id) values('$ilan_id','$uye_id') ");
    if($ekle){
        $rslt->tf=true;
        $rslt->text="Favorilere Eklendi";
        echo(json_encode($rslt));
    }
}

?>