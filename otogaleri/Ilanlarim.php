<?php


include("ayar.php");
$uye_id =$_GET["uye_id"];

class Result{
    
    public $ilan_id ;
    public $uye_id;
    public $ucret ;
    public $resim ;
    public $aciklama ;
    public $baslik ;
    public $tf ;
    public $sonuc ;
    public $sayi ;
}
$result = new Result();
$sorgula = mysqli_query($baglan,"SELECT c.*,p.*
FROM otoGaleriIlanlar as c JOIN otoGaleriResimler as p on p.id=(SELECT p1.id from otoGaleriResimler as p1 WHERE c.id=p1.ilan_id LIMIT 1)where c.uye_id = '$uye_id'");

$sayi = mysqli_num_rows($sorgula);
$sayac =0;
if($sayi>0){
    echo("[");
    while($data =mysqli_fetch_assoc($sorgula)){
        $sayac+=1;
        $result->ilan_id =$data["ilan_id"];
        $result->uye_id =$uye_id;
        $result->ucret =$data["ucret"] ;
        $result->resim =$data["resimyolu"];
        $result->aciklama =$data["aciklama"] ;
        $result->baslik =$data["baslik"] ;
        $result->tf =true ;
        $result->sonuc ="İlan Var" ;
        $result->sayi =$sayi ;
        echo(json_encode($result));
        if($sayac!=$sayi){
            echo(",");
        }
        
    }
    echo("]");
    
    
}else{
    echo("[");
        $result->tf =false ;
        $result->sonuc ="İlan Yok" ;
        echo(json_encode($result));
        echo("]");
}






?>