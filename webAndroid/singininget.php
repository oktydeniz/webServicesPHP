<?php
include('database.php');

$email = @$_POST["email"];
$password =@ $_POST["password"];
class Result{
    public $resut;
}
$rsl = new Result();
$ekle = @mysqli_query($baglan,"select * from webArea where email='$email' and passw ='$password'");
$number = @mysqli_num_rows($ekle);
if($number<1){

    $kaydet = @mysqli_query($baglan,"insert into webArea (email,passw) values('$email','$password')");
    if($kaydet){
        $rsl->resut = 'Kayıt Eklendi';
        echo json_encode($rsl);
    }
}
else{
    $rsl->resut = 'Kayıt zaten var !';
        echo json_encode($rsl);
}
?>