<?php
include("ayar.php");

$uye_id =$_GET["uye_id"];
class Result{
    public $tf;
    public $resimyolu;
    public $ilan_id;
    
}
$rsl = new Result();

$query = mysqli_query($baglan,"select c.*,p.resimyolu
from otoGaleriFavoriIlanlar as c 
join otoGaleriResimler as p on p.id= (select p1.id 
from otoGaleriResimler as p1 WHERE c.ilan_id = p1.ilan_id LIMIT 1)
WHERE c.uye_id = '$uye_id'");

$count = mysqli_num_rows($query);
$sayac = 0;
if($count>0){
    echo("[");
    while($ata=mysqli_fetch_assoc($query)){
        $sayac++;
        $rsl->tf=true;
        $rsl->resimyolu = $ata["resimyolu"];
        $rsl->ilan_id = $ata["ilan_id"];
        echo(json_encode($rsl));
        if($count>$sayac){
            echo(",");
        }
    }
    echo("]");
}else{
     echo("[");
     $rsl->tf=false;
     $rsl->ilan_id=null;
     $rsl->resimyolu = "ilanResimleri/image_not.png";
     echo(json_encode($rsl));
     echo("]");
}
?>