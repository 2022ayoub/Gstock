<?php
function deleteArticleNull($connexion){
  
  //  $sql="delete from article where quantity=0 ";
  //  $result=mysqli_query($connexion,$sql);

  $sql = "DELETE FROM article WHERE quantity=0";

  if (mysqli_query($connexion, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($connexion);
  }
  

}


?>