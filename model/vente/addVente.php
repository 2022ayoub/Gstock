<?php
session_start();
include("../../config/connect.php");
include("../article/getArticle.php");



if(
  !empty($_POST["articleId"])
  &&!empty($_POST["clientId"])
  &&!empty($_POST["quantity"])
  &&!empty($_POST["price"])
  &&!empty($_POST["venteDate"])
){
  $article=getArticle($conn,$_POST["articleId"]);
  $qt=$article["quantity"];
  $id_art=$article["id"];


  $aId=$_POST["articleId"];
  $cId=$_POST["clientId"];
  $qtite=$_POST["quantity"];
  $price=$_POST["price"];
  $vd=$_POST["venteDate"];

  if($qt>=$qtite){
    $sql="insert into vente(articleId,clientId,quantity,price,venteDate) values('$aId','$cId','$qtite','$price','$vd')";
    $result=mysqli_query($conn,$sql);

    if($result){
      $diff=$qt-$qtite;
      $sql="update article set quantity='$diff' where id= $aId";
      $result_diff=mysqli_query($conn,$sql);
      if($result_diff){
        $_SESSION["message"]["text"]="The vente is complete successfully ";
        $_SESSION["message"]["type"]="success";
      }
      else{
        $_SESSION["message"]["text"]="problem when update article quantity ";
        $_SESSION["message"]["type"]="danger";
      }

    }else{
      $_SESSION["message"]["text"]="Can't save the vente there is a problem ";
      $_SESSION["message"]["type"]="danger";
    }
  }
  else{
    $_SESSION["message"]["text"]="quantity insuffissante !";
    $_SESSION["message"]["type"]="danger";
  }
}
else{
  $_SESSION["message"]["text"]="All information are obligatoire !";
  $_SESSION["message"]["type"]="danger";
}

header("location:../../vue/vente.php");
?>