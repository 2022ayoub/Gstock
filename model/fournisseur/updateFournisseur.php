<?php
session_start();
include("../../config/connect.php");

if(
  !empty($_POST["firstName"])
  &&!empty($_POST["lastName"])
  &&!empty($_POST["phone"])
  &&!empty($_POST["adresse"])
  &&!empty($_POST["id"])
){
  $id=$_POST["id"];
  $fname=$_POST["firstName"];
  $lname=$_POST["lastName"];
  $phone=$_POST["phone"];
  $ad=$_POST["adresse"];

  $sql="update fournisseur set firstName='$fname',lastName='$lname',phone='$phone',adresse='$ad' where id=$id";
  $result=mysqli_query($conn,$sql);


  if($result){
    $_SESSION["message"]["text"]="The fournisseur is updated successfully ";
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

header("location:../../vue/fournisseur.php");
?>