<?php
 
$server="localhost";
$user="root";
$password="";
$db="g_stock";

try{
  $conn=mysqli_connect($server,$user,$password,$db);
  if(!$conn){throw new exception();}
}
catch(exception $e){echo "Connexion failed , Error :".mysqli_connect_error() ;} // modifier echo by die()


?>