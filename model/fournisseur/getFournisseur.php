<?php
// here you can pass connction as parameter or use $_globals when connect and here ;
function getFournisseurs($connexion) {
    $sql = "SELECT * FROM fournisseur";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $fs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $fs;
    } else {
        return [];
    }
}

function getFournisseur($connexion,$id){
  if(!empty($id)){
    $sql = "SELECT * FROM Fournisseur where id=$id";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $f = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $f;
    } else {
        return null;
    }
  }
  else{
    return null;
  }
}

?>