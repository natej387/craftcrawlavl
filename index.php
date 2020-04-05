<?php
require_once('private/initialize.php'); 
$page_title = 'Home'; 
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Craft Crawl Asheville <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
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
          <a class="nav-links" href="index.php" style="text-decoration:none">My-Progress</a>
          <?php else: ?>
          <a class="nav-links" href="public/breweries.php" style="text-decoration:none">Breweries</a>
          <?php endif; ?>
                
          <a href="../craftcrawlavl/public/members/map.php" >Map</a>
          <a href="#" >Contact</a>
      
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
      <article>
        <p>Explore local breweries and get rewarded.</p>
        
      </article>
    </section>
  
    <section id="s1" class="steps">
      <h2>Step 1</h2>
      <h3>Sign up</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </section>
    
    <section id="s2" class="steps">
      <h2>Step 2</h2>
      <h3>Visit Location</h3>
    
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </section>
    
    <section id="s3" class="steps">
      <h2>Step 3</h2>
      <h3>Get the code</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </section>
    
    <section id="s4" class="steps">
      <h2>Step 4</h2>
      <h3>Record your progress</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </section>
  
    </main>
    <footer class="footer">
    &copy; <?php echo date('Y'); ?> Craft Crawl Asheville
    </footer>
    
  </body>

</html>
