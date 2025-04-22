<?php
function commandesNumber($connexion){
  $sql="select count(*) as nb from commande where status != '0'";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $row = mysqli_fetch_assoc($result);
    $count = $row['nb'];
    mysqli_free_result($result);
    return $count;
  }
  else{
    return null;
  }
  
}



function ventesNumber($connexion){
  $sql="select count(*) as nb from vente where status != '0'";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $row = mysqli_fetch_assoc($result);
    $count = $row['nb'];
    mysqli_free_result($result);
    return $count;
  }
  else{
    return null;
  }
  
}

function articlesNumber($connexion){
  $sql="select count(*) as nb from article";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $row = mysqli_fetch_assoc($result);
    $count = $row['nb'];
    mysqli_free_result($result);
    return $count;
  }
  else{
    return null;
  }
  
}

function getCA($connexion){
  $sql="select sum(price) as ca from vente where status !='0'";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $count = $row['ca'];
    return $count;
  }
  else{
    return null;
  }
  
}

function getLastVentes($connexion){
  $sql="select v.venteDate,v.price,v.quantity,a.articleName,c.firstName,c.lastName from vente as v ,article as a,client as c where v.articleId=a.id and v.clientId=c.id and v.status!='0' order by v.venteDate DESC limit 10";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $lastventes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $lastventes;
  }else{
    return [];
  }
}


function getMostVentes($connexion){
  $sql="select a.articleName,a.unitairePrice,count(v.articleId) as nbre from article as a , vente as v where v.articleId=a.id and v.status!='0' group by a.articleName order by nbre DESC limit 10";
  $result=mysqli_query($connexion,$sql);
  if($result){
    $mostventes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $mostventes;
  }else{
    return [];
  }
}
?>