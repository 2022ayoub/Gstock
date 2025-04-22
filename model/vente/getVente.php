<?php
// here you can pass connction as parameter or use $_globals when connect and here ;
function getVentes($connexion) {
    $sql = "SELECT * FROM vente";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $ventes = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $ventes;
    } else {
        return [];
    }
}

function getVente($connexion,$id){
  if(!empty($id)){
    $sql = "SELECT * FROM vente where id=$id";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $vente = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $vente;
    } else {
        return null;
    }
  }
  else{
    return null;
  }
}

?>