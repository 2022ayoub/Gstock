<?php 
session_start();
$title=ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
$title=$title==="Dashboard"?$title:$title."s";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin - <?=$title?></title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar hidden-print">

      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">G-Stock</span>
      </div>

      <ul class="nav-links">

        <li>
          <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="client.php" class="<?= basename($_SERVER['PHP_SELF']) == 'client.php' ? 'active' : '' ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">Clients</span>
          </a>
        </li>

        <li>
          <a href="vente.php" class="<?= basename($_SERVER['PHP_SELF']) == 'vente.php' ? 'active' : '' ?>">
            <i class='bx bx-shopping-bag'></i>
            <span class="links_name">Sales</span>
          </a>
        </li>

        <li>
          <a href="article.php" class="<?= basename($_SERVER['PHP_SELF']) == 'article.php' ? 'active' : '' ?>">
            <i class="bx bx-box"></i>
            <span class="links_name">Articles</span>
          </a>
        </li>

        <li>
          <a href="fournisseur.php" class="<?= basename($_SERVER['PHP_SELF']) == 'fournisseur.php' ? 'active' : '' ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">fournisseurs</span>
          </a>
        </li>

        <li>
          <a href="commande.php" class="<?= basename($_SERVER['PHP_SELF']) == 'commande.php' ? 'active' : '' ?>">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>

        <li>
          <a href="analyses.php" class="<?= basename($_SERVER['PHP_SELF']) == 'analyses.php' ? 'active' : '' ?>">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analyses</span>
          </a>
        </li>

        <li>
          <a href="stock.php" class="<?= basename($_SERVER['PHP_SELF']) == 'stock.php' ? 'active' : '' ?>">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>

        <li>
          <a href="allCommandes.php" class="<?= basename($_SERVER['PHP_SELF']) == 'allCommandes.php' ? 'active' : '' ?>">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Tout les commmandes</span>
          </a>
        </li>

        

        <li>
          <a href="configuration.php" class="<?= basename($_SERVER['PHP_SELF']) == 'configuration.php' ? 'active' : '' ?>">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>

        <li class="log_out">
          <a href="#">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>

      </ul>

    </div>
    <section class="home-section">
      <nav class="hidden-print">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"><?=$title?></span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!-- <img src="images/profile.jpg" alt=""> -->
          <span class="admin_name">Komche</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>