<?php
session_start();
include("../../config/connect.php");

if(
  !empty($_GET["idcommande"])
  &&!empty($_GET["idarticle"])
  &&!empty($_GET["quantity"])
){
  $idc=$_GET["idcommande"];
  $ida=$_GET["idarticle"];
  $q=$_GET["quantity"];

  $sql="update commande set status='0' where id=$idc";
  $result=mysqli_query($conn,$sql);
  if($result){
    $_SESSION["message"]["text"]="the commande is canceled!";
    $_SESSION["message"]["type"]="success";
  }
  else{
    $_SESSION["message"]["text"]="can't cancel the commande!";
    $_SESSION["message"]["type"]="danger";
  }
}

header('Location:../../vue/commande.php');

?>