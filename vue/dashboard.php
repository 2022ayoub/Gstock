<?php 
include("../config/connect.php");
include("../model/dashboard/dashboard.php");
include("./head.php");

$commandes_nbre=commandesNumber($conn);
$ventes_nbre=ventesNumber($conn);
$articles_nbre=articlesNumber($conn);
$ca=getCA($conn);
$last_ventes=getLastVentes($conn);
$most_ventes=getMostVentes($conn);
?>
<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commande</div>
              <div class="number"><?=$commandes_nbre?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vente</div>
              <div class="number"><?=$ventes_nbre?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Article</div>
              <div class="number"><?=$articles_nbre?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">CA</div>
              <div class="number"><?=$ca?></div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
          <?php //print_r($most_ventes) ?>
        
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <?php foreach($last_ventes as $k=>$v): ?>
                <li><a href="#"><?= date("y-m-d h:i",strtotime($v["venteDate"])) ?></a></li>
                <?php endforeach?>
              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <?php foreach($last_ventes as $k=>$v): ?>
                <li><a href="#"><?= $v["firstName"]."  ".$v["lastName"] ?></a></li>
                <?php endforeach?>
              </ul>
              <ul class="details">
                <li class="topic">Produit</li>
                <?php foreach($last_ventes as $k=>$v): ?>
                <li><a href="#"><?= $v["articleName"] ?></a></li>
                <?php endforeach?>
              </ul>
              <ul class="details">
                <li class="topic">Quantity</li>
                <?php foreach($last_ventes as $k=>$v): ?>
                <li><a href="#"><?= $v["quantity"] ?></a></li>
                <?php endforeach?>
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <?php foreach($last_ventes as $k=>$v): ?>
                <li><a href="#"><?= $v["price"] ?></a></li>
                <?php endforeach?>
              </ul>
            </div>
            <div class="button">
              <a href="#">Voir Tout</a>
            </div>
          </div>

          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <ul class="top-sales-details">
              <?php foreach($most_ventes as $k=>$v):?>
                <li>
                  <a href="#">
                    <span class="product"><?=$v["articleName"]?></span>
                  </a>
                  <span class="price"><?=$v["unitairePrice"]?></span>
                </li>  
              <?php endforeach?>
            </ul>
          </div>
        </div>
      </div>
    </section>


<?php include("./foot.php") ?>