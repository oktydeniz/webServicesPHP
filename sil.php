<?php
include("index.php");
if($_POST){
    
$id = $_POST["id"];
$sil = mysqli_query($baglan,"delete from kullanici where id='$id'");
if($sil){
    $x = (array('Result'=>'İşlem Başarılı Oldu'));
    echo json_encode($x);
}else{
    $x = (array('Result'=>'Hata !'));
     echo json_encode($x);
}
    
}


?>