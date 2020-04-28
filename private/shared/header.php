<!doctype html>

<html lang="en">

<head>
  <title>Craft Crawl Asheville
    <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="<?php echo url_for('/js/jquery-3.4.1.min.js'); ?>"></script>
  <script src="<?php echo url_for('/js/craft-header.js'); ?>"></script>

</head>

<body class="grid-container">
  <header class="nav-container">

    <nav class="navbar">
      <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="burger-menu" aria-label="burger menu">
        <img src="../../assets/brewlogos/menu1.png" alt="hamburger icon">.
      </label>
      <div id="welcome">
        <?php
        if(isset($_SESSION['mem_fname'])) { echo 'Welcome ' . h($_SESSION['mem_fname']); }
        ?>
      </div>
      <a href="../../index.php" class="logo">Craft Crawl Asheville</a>

      <div class="navRight">
        <a href="../../index.php">Home</a>

        <?php if(isset($_SESSION['mem_id']) && $_SESSION['mem_level'] == 'a'): ?>
        <a class="nav-links" href="admin.php" style="text-decoration:none">Member Admin</a>
        <?php elseif(isset($_SESSION['mem_id']) && $_SESSION['mem_level'] == 'm'): ?>
        <a class="nav-links" href="index.php" style="text-decoration:none">My Progress</a>
        <?php else: ?>
        <a class="nav-links" href="../../public/breweries.php" style="text-decoration:none">Breweries</a>
        <?php endif; ?>

        <a href="../../public/members/map.php">Map</a>

        <a href="../../public/members/contact.php">Contact</a>

        <?php if(isset($_SESSION['mem_id'])): ?>
        <a class="nav-links" href="logout.php" style="text-decoration:none">Log out</a>
        <?php else: ?>
        <a class="nav-links" href="../../login.php" style="text-decoration:none">Log in</a>
        <?php endif; ?>

      </div>
    </nav>

  </header>

  <main>
    
