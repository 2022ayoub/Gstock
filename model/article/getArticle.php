<?php
// here you can pass connction as parameter or use $_globals when connect and here ;
function getArticles($connexion) {
    $sql = "SELECT * FROM article";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $articles;
    } else {
        return [];
    }
}

function getArticle($connexion,$id){
  if(!empty($id)){
    $sql = "SELECT * FROM article where id=$id";
    $result = mysqli_query($connexion, $sql);

    if ($result) {
        $article = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $article;
    } else {
        return null;
    }
  }
  else{
    return null;
  }
}

?>