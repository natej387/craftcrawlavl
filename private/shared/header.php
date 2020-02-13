<?php
  if(!isset($page_title)) { echo '- ' . h($page_title); }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Craft Crawl AVL <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Craft Crawl AVL</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/members/index.php'); ?>">Menu</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Brewery List</a></li>
        <li><a href="#">Map</a></li>
        <li><a href="#">How to crawl</a></li>
      </ul>
    </navigation>
