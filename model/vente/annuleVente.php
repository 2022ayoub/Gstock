<?php
session_start();
include("../../config/connect.php");

if(
  !empty($_GET["idvente"])
  &&!empty($_GET["idarticle"])
  &&!empty($_GET["quantity"])
){
  $idv=$_GET["idvente"];
  $ida=$_GET["idarticle"];
  $q=$_GET["quantity"];

  $sql="update vente set status='0' where id=$idv";
  $result=mysqli_query($conn,$sql);
  if($result){
    $sql="update article set quantity=quantity+$q where id=$ida";
    $result=mysqli_query($conn,$sql);
    if($result){
      $_SESSION["message"]["text"]="the vente is canceled!";
      $_SESSION["message"]["type"]="success";
    }else{
      $_SESSION["message"]["text"]="can't update the quantity after cancel vente!";
      $_SESSION["message"]["type"]="danger";
    }
    //$sql="delete from vente where status=0";
    //$result=mysqli_query($conn,$sql);
  }
  else{
    $_SESSION["message"]["text"]="can't cancel the vente!";
    $_SESSION["message"]["type"]="danger";
  }
}

header('Location:../../vue/vente.php');

?>