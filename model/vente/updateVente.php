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
  &&!empty($_POST["id"])
){

  $article=getArticle($conn,$_POST["articleId"]);
  $qt=$article["quantity"];
  $id_art=$article["id"];

  $id=$_POST["id"];
  $aId=$_POST["articleId"];
  $cId=$_POST["clientId"];
  $qtite=$_POST["quantity"];
  $price=$_POST["price"];
  $vd=$_POST["venteDate"];

  $sql="select * from vente where id=$id";
  $result=mysqli_query($conn,$sql);
  $q=mysqli_fetch_assoc($result)["quantity"];

  $newqt=($qtite-$q);

  if($qt>=$newqt){

    $sql="update vente set articleId='$aId',clientId='$cId',quantity='$qtite',price='$price',venteDate='$vd' where id=$id";
    $result=mysqli_query($conn,$sql);

    if($result){

      $diff=$qt-$newqt;
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



      $_SESSION["message"]["text"]="The vente is updated successfully ";
      $_SESSION["message"]["type"]="success";
    }else{
      $_SESSION["message"]["text"]="No Changes";
      $_SESSION["message"]["type"]="warning";
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