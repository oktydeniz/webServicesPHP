<?php
include("index.php");
$code = rand(10000,100000);
$ad =$_POST["kullaniciadi"];
$sifre =$_POST["sifre"];
$mailadres = $_POST["mail"];
$durum = 0;
$kontrol = mysqli_query($baglan,"select * from ekleme where kullaniciadi ='$ad' or mail='$mailadres'");
$sayi = mysqli_num_rows($kontrol);
if($sayi>0){
    
     $json=(array('Result'=>false));
     echo json_encode($json);
}else{
    $ekle=mysqli_query($baglan,"insert into ekleme (kullaniciadi,sifre,dogrulama,durum,mail) 
    values('$ad','$sifre','$code','$durum','$mailadres')");
    if($ekle){
        $to = $mailadres;
        $subject = "Mail Doğrulama Gerekiyor !";
        $message="Merhaba $ad aşagıdaki linkten mail adresnizi aktive ediniz.\n ------------------";
        $sender = "From: <dnzdnz077@hotmail.com>";
        $gonder =mail($to,$subject,$message,$sender);
        if($gonder){
           
             $json=(array('Result'=>true));
             echo json_encode($json);
           
        }
    }
}
?>