<?php 
include("../config/connect.php");
include("../model/article/getArticle.php");
include("../model/client/getClient.php");
include("../model/vente/getVente.php");
include("./head.php");

if(!empty($_GET["id"])){
  $vente=getVente($conn,$_GET["id"]);
  $client=getClient($conn,$vente["clientId"]);
}



?>
<div class="home-content">

  <div style="display:flex;justify-content:center;">
    <button id="print-btn" class="hidden-print"> 
        <i class='bx bxs-printer' ></i>
        <span>Print</span>
    </button>
  </div>
    
  <div class="page">

    <div class="cote-a-cote">
      <h2>G-stock</h2>
      <div>
        <h5>Reçu N° #: <?= $vente["id"] ?></h5>
        <h6>Date : <?php echo date("Y-m-d H:i",strtotime($vente["venteDate"]))?></h6>
      </div>
    </div>

    <div class="cote-a-cote" style="width:50%">
      <h3>Name : </h3>
      <h5><?php if($client && $client["firstName"] && $client["lastName"] ){echo $client["firstName"],"  ",$client["lastName"];}?></h5>
    </div>
    <div class="cote-a-cote" style="width:50%">
      <h3>Phone : </h3>
      <h5><?= $client["phone"]; ?></h5>
    </div>
    <div class="cote-a-cote" style="width:50%">
      <h3>Addresse : </h3>
      <h5><?= $client["adresse"]; ?></h5>
    </div>
    <br>
    <table class="mtable">
      <tr>
        <th>Designation </th>
        <th>Quantity </th>
        <th>Unit Price </th>
        <th>Total Price </th>
      </tr>    
      <tr>
        <td>
          <?php
            $art=getArticle($conn,$vente["articleId"]);
            echo $art["articleName"];
          ?>
        </td>

        <td><?php echo $vente["quantity"]; ?></td>
        <td>
          <?php
            $art=getArticle($conn,$vente["articleId"]);
            echo $art["unitairePrice"];
          ?>
        </td>
        <td><?php echo $vente["price"] ?></td>
      </tr>

    </table>
  
      
  </div>  
</div>
</section>




<?php include("./foot.php") ?>


<script>
  let printBtn=document.getElementById("print-btn");
  printBtn.addEventListener("click",()=>{
    window.print();
  });
</script>