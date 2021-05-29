<?php
include("ayar.php");

$sorgula = mysqli_query($baglan,"SELECT c.*,p.*
FROM otoGaleriIlanlar as c JOIN otoGaleriResimler as p on p.id=(SELECT p1.id from otoGaleriResimler as p1 WHERE c.id=p1.ilan_id LIMIT 1)");

class Result{
    public $ilan_id;
    public $uye_id;
    public $ucret;
    public $resim;
    public $aciklama;
    public $baslik;
    public $tf;
    public $sayi;
    public $il;
    public $ilce;
    public $mahalle;
}
$result = new Result();
$sayac =0;
$say = mysqli_num_rows($sorgula);
if($say>0){
    echo("[");
    while($atama = mysqli_fetch_assoc($sorgula)){
        $sayac+=1;
        $result->ilan_id =$atama["ilan_id"];
        $result->uye_id =$atama["uye_id"];
        $result->ucret =$atama["ucret"] ;
        $result->resim =$atama["resimyolu"];
        $result->aciklama =$atama["aciklama"] ;
        $result->baslik =$atama["baslik"] ;
        $result->tf =true ;
        $result->sayi =$say ;
        $result->il =$atama["sehir"] ;
        $result->ilce =$atama["ilce"] ;
        $result->mahalle =$atama["mahalle"] ;
        echo(json_encode($result));
        if($sayac!=$say){
            echo(",");
        }
    }
    echo("]");
}    
else{
    echo("[");
    $result->tf =false ;
    echo(json_encode($result));
    echo("]");
}

?>