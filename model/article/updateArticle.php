<?php
session_start();
include("../../config/connect.php");

if(
  !empty($_POST["articleName"])
  &&!empty($_POST["category"])
  &&!empty($_POST["quantity"])
  &&!empty($_POST["unitairePrice"])
  &&!empty($_POST["fabricationDate"])
  &&!empty($_POST["expirationDate"])
  &&!empty($_POST["id"])
){
  $id=$_POST["id"];
  $name=$_POST["articleName"];
  $cat=$_POST["category"];
  $qtite=$_POST["quantity"];
  $unitp=$_POST["unitairePrice"];
  $fd=$_POST["fabricationDate"];
  $ed=$_POST["expirationDate"];

  $sql="update article set articleName='$name',category='$cat',quantity='$qtite',unitairePrice='$unitp',fabricationDate='$fd',expirationDate='$ed' where id=$id";
  $result=mysqli_query($conn,$sql);


  if($result){
    $_SESSION["message"]["text"]="The article is updated successfully ";
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

header("location:../../vue/article.php");

?>