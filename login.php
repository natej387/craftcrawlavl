<?php

require_once('private/initialize.php');

$members = find_all_members();

$errors = [];
$email = '';
$password = '';

if(is_post_request()) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['pass_hash'] ?? '';

    if(is_blank($email) || is_blank($password))
    {
      $errors[] =  "Email or password cannot be blank";
    }

    if(empty($errors)) {

      // get the member
      
      $member = find_member_by_email($email);
      
        if(password_verify($password, $member['mem_pass_hash'])) {
           
            if($member['mem_level'] == 'm'){
              // password matched
              loginMember($member);
            
            redirect_to('/craftcrawlavl/public/members/');
        } elseif($member['mem_level'] == 'a') {
            loginMember($member);
            redirect_to('/craftcrawlavl/public/members/admin.php');
            }
        }
      else {
          // username found but password does not match
          // TODO: display errors array
         $errors[] =  "Email found but password does not match";
        }
      }
    
      else {
        $errors[] =  "No account found";
      }
  }
  
$page_title = 'Login';

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Craft Crawl Asheville <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <script src="/public/js/jquery-3.4.1.min.js"></script>
    <script src="/public/js/craft-header.js"></script>
    
    <link rel="stylesheet" media="all" href="public/stylesheets/coffee-club.css" />
  </head>
  <body class="grid-container">
    <header class="nav-container">
      
      <nav class="navbar">
        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="burger-menu">
        <img src="assets/brewlogos/menu1.png" alt="burger menu icon">.
        </label>
        
        <a href="#" class="logo">Craft Crawl Asheville</a>
        <div class="navRight">
            
          <a href="index.php" >Home</a>
                
          <?php if(isset($_SESSION['mem_id'])): ?>
          <a class="nav-links" href="public/members/index.php" style="text-decoration:none">My Progress</a>
          <?php else: ?>
          <a class="nav-links" href="public/breweries.php" style="text-decoration:none">Breweries</a>
          <?php endif; ?>
                
          <a href="public/members/map.php">Map</a>
          <a href="public/members/contact.php">Contact</a>
      
          <?php if(isset($_SESSION['mem_id'])): ?>
          <a class="nav-links" href="public/members/logout.php" style="text-decoration:none">Log out</a>
          <?php else: ?>
          <a class="nav-links" href="login.php" style="text-decoration:none">Log in</a>
          <?php endif; ?>
            
        </div>
      </nav>
    </header>
    
    <main>

    <div id="content">
      <h1>Login</h1>
     <!-- TODO: update form for validation -->
    
      <?php  echo display_errors($errors); ?>
        
      <div class="container">
  <form action="" method="post">
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Your email..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pass_hash">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="pass_hash" name="pass_hash" placeholder="Your password..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>    
        
    </form>

       
    </div>

    <div class="actions">
      <a class="action" href="create.php">Create Account</a>
    </div>
    
    </main>
    
    <footer class="footer">
    &copy; <?php echo date('Y'); ?> Craft Crawl Asheville
    </footer>

    </body>
</html>
  

<?php
  db_disconnect($db);
?>