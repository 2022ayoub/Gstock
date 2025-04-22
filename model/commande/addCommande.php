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
){
  $aId=$_POST["articleId"];
  $fId=$_POST["fournisseurId"];
  $qtite=$_POST["quantity"];
  $price=$_POST["price"];
  $cd=$_POST["commandeDate"];

  $sql="insert into commande(articleId,fournisseurId,quantity,price,commandeDate) values('$aId','$fId','$qtite','$price','$cd')";
  $result=mysqli_query($conn,$sql);

  if($result){
    
    $_SESSION["message"]["text"]="The commande is complete successfully ";
    $_SESSION["message"]["type"]="success";
    
    

  }else{
    $_SESSION["message"]["text"]="Can't save the commande there is a problem ";
    $_SESSION["message"]["type"]="danger";
  }
  
}
else{
  $_SESSION["message"]["text"]="All information are obligatoire !";
  $_SESSION["message"]["type"]="danger";
}

header("location:../../vue/commande.php");
?>