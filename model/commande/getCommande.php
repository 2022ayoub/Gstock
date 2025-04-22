<?php
// here you can pass connction as parameter or use $_globals when connect and here ;
function getCommandes($connexion) {
    $sql = "SELECT * FROM commande";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $Cs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $Cs;
    } else {
        return [];
    }
}

function getCommande($connexion,$id){
  if(!empty($id)){
    $sql = "SELECT * FROM commande where id=$id";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $c = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $c;
    } else {
        return null;
    }
  }
  else{
    return null;
  }
}

?>