<?php 
include("../config/connect.php");
include("../model/article/getArticle.php");
include("./head.php");


//include("../model/article/deleteArticle.php");
//deleteArticleNull($conn);

if(!empty($_GET["id"])){
  $article=getArticle($conn,$_GET["id"]);
}
?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <form action="<?= !empty($_GET["id"]) ? "../model/article/updateArticle.php" : "../model/article/addArticle.php" ?>" method="post">

        <input type="hidden" name="id" id="id" value="<?= $article["id"] ?>">

        <label for="article_name">Article Name :</label>
        <input type="text" name="articleName" id="article_name" placeholder="Write the article name" 
            value="<?= !empty($_GET["id"])? $article["articleName"] : "" ?>">
        

        <label for="category">Category :</label>
         <select name="category" id="category">
          <option selected hidden disabled >Choose a category for the article</option>
          <option <?= !empty($_GET["id"]) && $article["category"]=="computer"?"selected" : "" ?> value="computer">computer</option>
          <option <?= !empty($_GET["id"]) && $article["category"]=="printer"?"selected" : "" ?> value="printer">printer</option>
          <option <?= !empty($_GET["id"]) && $article["category"]=="accessories"?"selected" : "" ?> value="accessories">accessories</option>
         </select>

        <label for="quantity">Quantity :</label>
        <input type="number" name="quantity" id="quantity" placeholder="Write the article quantity"
          value="<?= !empty($_GET["id"])? $article["quantity"] : "" ?>" >

        <label for="unitPrice">Unit Price :</label>
        <input type="number" name="unitairePrice" id="unitPrice" placeholder="Write the unit price for this article"
          value="<?= !empty($_GET["id"])? $article["unitairePrice"] : "" ?>" >

        <label for="fabricationDate">Fabrication Date :</label>
        <input type="datetime-local" name="fabricationDate" id="fabricationDate" 
          value="<?= !empty($_GET["id"])? $article["fabricationDate"] : "" ?>">

        <label for="expirationDate">Expiration Date :</label>
        <input type="datetime-local" name="expirationDate" id="expirationDate" 
          value="<?= !empty($_GET["id"]) ?  $article["expirationDate"] : "";?>">

        <div class="btns">
          <button type="submit" id="save-article">Save</button>
          <button type="reset" style="background-color:red">Clear</button>
        </div>
        
      </form>
    </div>
    
    <div class="box">
      <table class="mtable">
        <tr>
          <th>Article Name </th>
          <th>Category </th>
          <th>Quantity </th>
          <th>Unit Price </th>
          <th>Fabrication Date</th>
          <th>Expiration Date</th>
          <th>Action</th>
        </tr>

        <?php 
          $articles=getArticles($conn);
          if(!empty($articles) && is_array($articles)):foreach($articles as $key=>$val):
        ?>
        
        <tr>
          <td><?php echo $val["articleName"] ?></td>
          <td><?php echo $val["category"] ?></td>
          <td><?php echo $val["quantity"] ?></td>
          <td><?php echo $val["unitairePrice"] ?></td>
          <td><?php echo $val["fabricationDate"] ?></td>
          <td><?php echo $val["expirationDate"] ?></td>
          <td><a href="?id=<?=$val["id"]?>"><i class='bx bx-edit-alt' style="font-size:30px" ></i></a></td>
        </tr>

        <?php
          endforeach;
          endif;
        ?>
      </table>

    </div>
  </div>


    <?php if(!empty($_SESSION["message"]["text"])): ?>
      <div id="form-msg" class="alert <?php echo $_SESSION["message"]["type"] ?>">
        <?php echo $_SESSION["message"]["text"] ?>
      </div>

      <script>
        let formMSG = document.getElementById("form-msg");
        formMSG.style.display = "block";
        console.log("is block now");
        setTimeout(() => {
          formMSG.style.display = "none";
          console.log("is none now");
        }, 5000);
      </script>

      <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>



</div>
</section>




<?php include("./foot.php") ?>