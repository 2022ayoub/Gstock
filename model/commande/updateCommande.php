<?php
session_start();
include("../../config/connect.php");
include("../article/getArticle.php");

if(
  !empty($_POST["articleId"])
  &&!empty($_POST["fournisseurId"])
  &&!empty($_POST["quantity"])
  &&!empty($_POST["price"])
  &&!empty($_POST["commandeDate"])
  &&!empty($_POST["id"])
){

  $id=$_POST["id"];
  $aId=$_POST["articleId"];
  $fId=$_POST["fournisseurId"];
  $qtite=$_POST["quantity"];
  $price=$_POST["price"];
  $cd=$_POST["commandeDate"];

  $sql="update commande set articleId='$aId',fournisseurId='$fId',quantity='$qtite',price='$price',commandeDate='$cd' where id=$id";
  $result=mysqli_query($conn,$sql);

  if($result){

    $_SESSION["message"]["text"]="The commande is updated successfully ";
    $_SESSION["message"]["type"]="success";
  }else{
    $_SESSION["message"]["text"]="No Changes";
    $_SESSION["message"]["type"]="warning";
  }

  
}
else{
  $_SESSION["message"]["text"]="All information are obligatoire !";
  $_SESSION["message"]["type"]="danger";
}

header("location:../../vue/commande.php");

?>