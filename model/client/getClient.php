<?php
// here you can pass connction as parameter or use $_globals when connect and here ;
function getClients($connexion) {
    $sql = "SELECT * FROM client";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $clients;
    } else {
        return [];
    }
}

function getClient($connexion,$id){
  if(!empty($id)){
    $sql = "SELECT * FROM client where id=$id";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $client = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $client;
    } else {
        return null;
    }
  }
  else{
    return null;
  }
}

?>