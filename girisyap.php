<?php
include("index.php");
class uyeler{
    
    public $id;
    public $k_adi;
    public $k_sifre;
}
$uyeNesne = new uyeler();
$kul_adi = $_POST["k_adi"];
$kul_sifre =$_POST["k_sifre"];
$kontrol = mysqli_query($baglan,"select * from uyeler where k_adi='$kul_adi' and k_sifre='$kul_sifre'");
while($data=mysqli_fetch_assoc($kontrol)){
    $uyeNesne->id=$data["id"];
    $uyeNesne->k_adi=$data["k_adi"];
    $uyeNesne->k_sifre = $data["k_sifre"];
    
    echo(json_encode($uyeNesne));
    
}




?>