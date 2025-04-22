<?php 
include("../config/connect.php");
include("../model/article/getArticle.php");
include("../model/fournisseur/getFournisseur.php");
include("../model/commande/getCommande.php");
include("./head.php");

if(!empty($_GET["id"])){
  $commande=getCommande($conn,$_GET["id"]);
}

$commandes=getCommandes($conn);

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <form action="<?= !empty($_GET["id"]) ? "../model/commande/updateCommande.php" : "../model/commande/addCommande.php" ?>" method="post">

        <input type="hidden" name="id" id="id" value="<?= $commande["id"] ?>">

        
        <label for="articleId">Article :</label>
         <select name="articleId" id="articleId">
            <option selected hidden disabled >Choose An Article</option>
            <?php
              $articles=getArticles($conn);
              if(!empty($articles) && is_array($articles)):foreach($articles as $key=>$value):
            ?>
                <?php if($value["quantity"]!="0"){ ?>
                  <option data-prix="<?=$value["unitairePrice"] ?>"
                    <?= !empty($_GET["id"]) && $commande["articleId"]==$value["id"]?"selected" : "" ?>
                  value="<?= $value["id"] ?>"><?= $value["articleName"]. " "."-".$value["quantity"]." disponible" ?>
                  </option>
                <?php }?>

            <?php endforeach;endif;?>
         </select>

         <label for="fournisseurId">Fournisseur :</label>
         <select name="fournisseurId" id="fournisseurId">
            <option selected hidden disabled >Choose the Fournisseur</option>
            <?php
              $fournisseurs=getFournisseurs($conn);
              if(!empty($fournisseurs) && is_array($fournisseurs)):foreach($fournisseurs as $key=>$value):
            ?>
                
              <option <?= !empty($_GET["id"]) && $commande["fournisseurId"]==$value["id"]?"selected" : "" ?> value="<?= $value["id"] ?>"><?= $value["firstName"]." ".$value["lastName"] ?></option>

            <?php endforeach;endif;?>
         </select>

        
         <label for="quantity">Quantity :</label>
        <input type="number" name="quantity" id="quantity" placeholder="Write the quantity"
          value="<?= !empty($_GET["id"])? $commande["quantity"] : "" ?>" >

        <label for="price"> Price :</label>
        <input type="number" name="price" id="price" placeholder="Write the  price "
          value="<?= !empty($_GET["id"])? $commande["price"] : "" ?>" >

        <label for="commandeDate">commande Date :</label>
        <input type="datetime-local" name="commandeDate" id="commandeDate" 
          value="<?= !empty($_GET["id"])? $commande["commandeDate"] : "" ?>">


        <div class="btns">
          <button type="submit" id="save-article">Save</button>
          <button type="reset" style="background-color:red">Clear</button>
        </div>
        
      </form>
    </div>
    
    <div class="box commande">
      <?php if(empty($commandes) || !is_array($commandes)){?>
        <h1>No Commandes exists now</h1>
      <?php }else{ ?>
        <table class="mtable">
          <tr>
            <th>Article </th>
            <th>Fournisseur </th>
            <th>Quantity </th>
            <th>Price </th>
            <th>Commande Date</th>
            <th>Action</th>
          </tr>

          <?php 
            foreach($commandes as $key=>$val):
              if($val["status"]!=="0"){
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
                  $ct=getFournisseur($conn,$val["fournisseurId"]);
                  echo $ct["firstName"],"  ",$ct["lastName"];
                ?>
              </td>
              <td><?php echo $val["quantity"] ?></td>
              <td><?php echo $val["price"] ?></td>
              <td><?php echo date("Y-m-d H:i",strtotime($val["commandeDate"]))?></td>
              <td>
                <a href="?id=<?=$val["id"]?>"><i class='bx bx-edit-alt' style="font-size:30px;color:blueviolet" ></i></a>
                <a onClick="annulerCommande(<?=$val['id']?>,<?=$val['articleId']?>,<?=$val['quantity']?>)" style="cursor:pointer">
                  <i class='bx bx-stop-circle'style="font-size:30px;margin-left:10px;color:red;" ></i>
                </a>
              </td>
            </tr>

          <?php
            }endforeach;
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


<script>

  function setTotalPrice(){
    let select=document.querySelector("#articleId")
    var unit_prix=select.options[select.selectedIndex].getAttribute("data-prix");
    var qtite=document.querySelector("#quantity").value;
    var price_elt=document.querySelector("#price");
    price_elt.value=(Number(unit_prix)*Number(qtite));

    console.log(unit_prix,qtite,price_elt.value)
  }
  document.querySelector("#articleId").onchange=()=>{setTotalPrice();}
  document.querySelector("#quantity").onkeyup=()=>{setTotalPrice();}


  function annulerCommande(idcommande,idarticle,quantity){
    if(confirm("do you really want to cancel the commande !")){
      window.location.href=`../model/commande/annuleCommande.php?idcommande=${idcommande}&idarticle=${idarticle}&quantity=${quantity}`;
    }
  }
</script>