<?php

include("ayar.php");


$uye_id =$_POST["uye_id"];
$ilan_id =$_POST["ilan_id"];
$resim  = $_POST["resim"];


class Result{
    public $sonuc;
    public $tf;
}
$rslt = new Result();

$baslik = rand(0,100000).rand(0,100000).rand(0,100000).substr(md5(microtime()),rand(0,26),5).rand(0,100000).rand(0,100000).substr(md5(microtime()),rand(0,26),5);

//resim ismini belirliyoruz  rasgele yapıyoruzki bir başka resmin ismi ile aynı ola olasılığı düşsün

$resimyolu = "ilanResimleri/$baslik.jpg";

$ekle = mysqli_query($baglan,"insert into otoGaleriResimler(uye_id,ilan_id,baslik,resimyolu) values('$uye_id','$ilan_id','$baslik','$resimyolu')");


if($ekle){
    //resimleri klasore ekleme
   file_put_contents($resimyolu,base64_decode($resim));
   $rslt->sonuc = "İşlem Başarılı";
   $rslt->tf =true;
   echo(json_encode($rslt));
   
   
}else{
    $rslt->sonuc = "İşlem Başarısız";
    $rslt->tf =false;
    echo(json_encode($rslt));
}



?>