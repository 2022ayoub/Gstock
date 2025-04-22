<?php 
include("../config/connect.php");
include("../model/article/getArticle.php");
include("../model/client/getClient.php");
include("../model/vente/getVente.php");
include("./head.php");

if(!empty($_GET["id"])){
  $vente=getVente($conn,$_GET["id"]);
}

$ventes=getVentes($conn);

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <form action="<?= !empty($_GET["id"]) ? "../model/vente/updateVente.php" : "../model/vente/addVente.php" ?>" method="post">

        <input type="hidden" name="id" id="id" value="<?= $vente["id"] ?>">

        
        <label for="articleId">Article :</label>
         <select name="articleId" id="articleId">
            <option selected hidden disabled >Choose An Article</option>
            <?php
              $articles=getArticles($conn);
              if(!empty($articles) && is_array($articles)):foreach($articles as $key=>$value):
            ?>
                <?php if($value["quantity"]!="0"){ ?>
                  <option
                    <?= !empty($_GET["id"]) && $vente["articleId"]==$value["id"]?"selected" : "" ?>
                  value="<?= $value["id"] ?>"><?= $value["articleName"]. " "."-".$value["quantity"]." disponible" ?>
                  </option>
                <?php }?>

            <?php endforeach;endif;?>
         </select>

         <label for="clientId">Client :</label>
         <select name="clientId" id="clientId">
            <option selected hidden disabled >Choose the Client</option>
            <?php
              $clients=getClients($conn);
              if(!empty($clients) && is_array($clients)):foreach($clients as $key=>$value):
            ?>
                
              <option <?= !empty($_GET["id"]) && $vente["clientId"]==$value["id"]?"selected" : "" ?> value="<?= $value["id"] ?>"><?= $value["firstName"]." ".$value["lastName"] ?></option>

            <?php endforeach;endif;?>
         </select>

        
         <label for="quantity">Quantity :</label>
        <input type="number" name="quantity" id="quantity" placeholder="Write the quantity"
          value="<?= !empty($_GET["id"])? $vente["quantity"] : "" ?>" >

        <label for="price"> Price :</label>
        <input type="number" name="price" id="price" placeholder="Write the  price "
          value="<?= !empty($_GET["id"])? $vente["price"] : "" ?>" >

        <label for="venteDate">Vente Date :</label>
        <input type="datetime-local" name="venteDate" id="venteDate" 
          value="<?= !empty($_GET["id"])? $vente["venteDate"] : "" ?>">


        <div class="btns">
          <button type="submit" id="save-article">Save</button>
          <button type="reset" style="background-color:red">Clear</button>
        </div>
        
      </form>
    </div>
    
    <div class="box vente">
      <?php if(empty($ventes) || !is_array($ventes)){?>
        <h1>No Ventes exists now</h1>
      <?php }else{ ?>
        <table class="mtable">
          <tr>
            <th>Article </th>
            <th>Client </th>
            <th>Quantity </th>
            <th>Price </th>
            <th>Vente Date</th>
            <th>Action</th>
          </tr>

          <?php 
            foreach($ventes as $key=>$val):
          ?>
          
            <tr>
              <td>
                <?php
                  $art=getArticle($conn,$val["articleId"]);
                  echo $art["articleName"];
                ?>
              </td>

              <td>
                <?php
                  $ct=getClient($conn,$val["clientId"]);
                  echo $ct["firstName"],"  ",$ct["lastName"];
                ?>
              </td>
              <td><?php echo $val["quantity"] ?></td>
              <td><?php echo $val["price"] ?></td>
              <td><?php echo date("Y-m-d H:i",strtotime($val["venteDate"]))?></td>
              <td><a href="?id=<?=$val["id"]?>"><i class='bx bx-edit-alt' style="font-size:30px" ></i></a></td>
            </tr>

          <?php
            endforeach;
          ?>
        </table>
      <?php }; ?>
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