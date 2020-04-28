<?php
  require_once('private/initialize.php'); 
  $page_title = 'Home'; 
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Craft Crawl Asheville <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/public/js/jquery-3.4.1.min.js"></script>
    <script src="public/js/craft-header.js"></script>
    <link rel="stylesheet" media="all" href="public/stylesheets/coffee-club.css" />
  </head>
  <body class="grid-container">
    <header class="nav-container">
      
      <nav class="navbar">
        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="burger-menu" aria-label="burger menu">
        <img src="assets/brewlogos/menu1.png" alt="">.
        </label>
        
        <div id="welcome">
          <?php
          if(isset($_SESSION['mem_fname'])) { echo 'Welcome ' . h($_SESSION['mem_fname']); }
          ?>
        </div>
        
        <a href="#" class="logo">Craft Crawl Asheville</a>
        <div class="navRight">
            
          <a href="index.php" >Home</a>
                
          <?php if(isset($_SESSION['mem_id']) && $_SESSION['mem_level'] == 'a'): ?>
          <a class="nav-links" href="public/members/admin.php" style="text-decoration:none">Member Admin</a>
          <?php elseif(isset($_SESSION['mem_id']) && $_SESSION['mem_level'] == 'm'): ?>
          <a class="nav-links" href="public/members/index.php" style="text-decoration:none">My Progress</a>
          <?php else: ?>
          <a class="nav-links" href="public/breweries.php" style="text-decoration:none">Breweries</a>
          <?php endif; ?>
                
          <a href="public/members/map.php" >Map</a>
          <a href="public/members/contact.php" >Contact</a>
      
          <?php if(isset($_SESSION['mem_id'])): ?>
          <a class="nav-links" href="public/members/logout.php" style="text-decoration:none">Log-out</a>
          <?php else: ?>
          <a class="nav-links" href="login.php" style="text-decoration:none">Log in</a>
          <?php endif; ?>
            
        </div>
      </nav>
    </header>
  
    <main>
    <section class="hero">
      <h1>Ready to Explore?</h1>
    </section>
      <h2 id="homeh2">How it Works:</h2>
    <section onclick="location.href='create.php'" id="s1" class="steps">
      <img src="assets/brewlogos/human-add-performance-business-finance-256.png" alt="craft beer in glass" alt="add person icon">
      <h2>Create an Account</h2>
      <p>If you haven't already, DO IT! It's fast, easy and FREE!</p>
    </section>
    
    <section onclick="location.href='public/breweries.php'" id="s2" class="steps">
      <img src="assets/brewlogos/iconfinder_map_285662.png" alt="map icon">
      <h2>Visit the Breweries</h2>
      <p>We've partnered with some of the best breweries in Asheville.  They're all in walking distance and offer unique and exciting experiences.</p>
    </section>
    
    <section onclick="location.href='public/members/validate_code.php'" id="s3" class="steps">
      <img src="assets/brewlogos/_merry_christmas-256.png" alt="word bubble icon">
      <h2>Get the Code</h2>    
      <p>Buy any beer and you'll receive a unique code to record your progress.</p>
    </section>
    
    <section onclick="location.href='public/members/index.php'" id="s4" class="steps">
      <img src="assets/brewlogos/iconfinder_gift_inside_question_2766332.png" alt="gift icon">
      <h2>Complete the Crawl</h2>
      <p>Visit every brewery on the list to complete the crawl and receive a commemorative prize. </p>
    </section>
  
    </main>
    <footer class="footer">
    &copy; <?php echo date('Y'); ?> Craft Crawl Asheville
    </footer>
    
  </body>

</html>
