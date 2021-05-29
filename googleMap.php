<?php
include("index.php");
$sorgu = mysqli_query($baglan,"select * from googleMap ");
$dizi = mysqli_fetch_assoc($sorgu);

class Result{
    public $title;
    public $lat;
    public $lot;
}
$rsl = new Result();

$rsl->title =$dizi["title"];
$rsl->lat =$dizi["lat"];
$rsl->lot =$dizi["lot"];
echo(json_encode($rsl));
?>