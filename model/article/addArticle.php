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
){
  $name=$_POST["articleName"];
  $cat=$_POST["category"];
  $qtite=$_POST["quantity"];
  $unitp=$_POST["unitairePrice"];
  $fd=$_POST["fabricationDate"];
  $ed=$_POST["expirationDate"];

  $sql="insert into article(articleName,category,quantity,unitairePrice,fabricationDate,expirationDate) values('$name','$cat','$qtite','$unitp','$fd','$ed')";
  $result=mysqli_query($conn,$sql);

  if($result){
    $_SESSION["message"]["text"]="The article is saved successfully ";
    $_SESSION["message"]["type"]="success";
  }else{
    $_SESSION["message"]["text"]="Can't add the article there is a problem ";
    $_SESSION["message"]["type"]="danger";
  }
}
else{
  $_SESSION["message"]["text"]="All information are obligatoire !";
  $_SESSION["message"]["type"]="danger";
}

header("location:../../vue/article.php");
?>