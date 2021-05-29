<?php
include("ayar.php");

$k_adi =$_POST["kullanici_adi"];
$dogrulamaKodu =$_POST["dogrulama_kodu"];

class Result{
    public $result;
    public $tf;
    public $id;
    public $kadi;
}
$rslt = new Result();

$kontrol = mysqli_query($baglan,"select * from otoGaleriUyeler where kullanici_adi = '$k_adi' and dogrulama = '$dogrulamaKodu' and durum='0'");
if(mysqli_num_rows($kontrol)>0){
    //id alma işlemi için sharedreferances kullanımı için doğrulamadan sonra
    
    $kontrol2 = mysqli_fetch_assoc(mysqli_query($baglan,"select * from otoGaleriUyeler where kullanici_adi = '$k_adi' and dogrulama = '$dogrulamaKodu' and durum='0'"));
    
    
    $update = mysqli_query($baglan,"update otoGaleriUyeler set durum = '1' where kullanici_adi = '$k_adi' and dogrulama = '$dogrulamaKodu'");
    
    
    if($update){
        $rslt->tf = true;
        $rslt->result = "E-Mail Adresiniz Doğrulandı";
        $rslt->id = $kontrol2["id"];
        $rslt->kadi = $kontrol2["kullanici_adi"];
        
        echo(json_encode($rslt));
    
    }
    
}else{
        $rslt->tf = false;
        $rslt->result = "E-Mail Adresiniz Doğrulanamadı";
        $rslt->id = null;
        $rslt->kadi = null;
        echo(json_encode($rslt));
}

?>