<?php
include("index.php");
class urunler{
    public $id;
    public $adi;
    public $fiyat;
    public $resim;

}
$urun = new urunler();
$al = mysqli_query($baglan,"select * from urunler");
$toplam = mysqli_num_rows($al);
//echo($toplam);
$sayac=0;
echo("[");
while($goster=mysqli_fetch_assoc($al)){
    $sayac+=1;
    $urun->id = $goster["id"];
    $urun->adi=$goster["adi"];
    $urun->fiyat=$goster["fiyat"];
    $urun->resim=$goster["resim"];
    echo json_encode($urun);
    if($sayac!=$toplam){
        echo(",");
    }
    
    
}
echo("]");





?>