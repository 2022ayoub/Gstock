<?php
session_start();
include("../../config/connect.php");

if(
  !empty($_POST["firstName"])
  &&!empty($_POST["lastName"])
  &&!empty($_POST["phone"])
  &&!empty($_POST["adresse"])
){
  $fname=$_POST["firstName"];
  $lname=$_POST["lastName"];
  $phone=$_POST["phone"];
  $ad=$_POST["adresse"];

  $sql="insert into fournisseur(firstName,lastName,phone,adresse) values('$fname','$lname','$phone','$ad')";
  $result=mysqli_query($conn,$sql);

  if($result){
    $_SESSION["message"]["text"]="The fournisseur is saved successfully ";
    $_SESSION["message"]["type"]="success";
  }else{
    $_SESSION["message"]["text"]="Can't add the fournisseur there is a problem ";
    $_SESSION["message"]["type"]="danger";
  }
}
else{
  $_SESSION["message"]["text"]="All information are obligatoire !";
  $_SESSION["message"]["type"]="danger";
}

header("location:../../vue/fournisseur.php");
?>