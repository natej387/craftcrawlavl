<?php
  require_once('private/initialize.php');
  $page_title = 'Create Account';

  if(is_post_request()) {
    $errors = [];
    $member = [];
    $member['mem_fname'] = $_POST['first_name'] ?? '';
    $member['mem_lname'] = $_POST['last_name'] ?? '';
    $member['mem_email'] = $_POST['email'] ?? '';
    $member['mem_pass_hash'] = $_POST['pass_hash'] ?? '';
    $member['mem_level'] = $_POST['member_level'] ?? '';

    //checks that member doesn't exist
    $memAlready = find_member_by_email($member['mem_email']);
    if($member['mem_email'] == $memAlready['mem_email']) {
      $errors[] =  "Account has already been made";
  
    } else {
      //inserts member and auto logs in
      $result = insert_member($member);
  
      if($result === true) {
        $_SESSION['mem_id'] = mysqli_insert_id($db);
        $member = find_member_by_id($_SESSION['mem_id']);
        loginMember($member);  
        redirect_to('/craftcrawlavl/public/members/');
        
      } else {
        $errors = $result;
      }
    }
  } else {
  // display the blank form
    $member = [];
    $member['mem_fname'] = '';
    $member['mem_lname'] = '';
    $member['mem_email'] = '';
    $member['mem_pass_hash'] = '';
    $member['mem_level'] = '';
  }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Craft Crawl Asheville <?php if(!isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/public/js/jquery-3.4.1.min.js"></script>
    <script src="/public/js/craft-header.js"></script>
    <link rel="stylesheet" media="all" href="public/stylesheets/coffee-club.css" />
  </head>
  <body class="grid-container">
    <header class="nav-container">
      
      <nav class="navbar">
        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="burger-menu">
        <img src="assets/brewlogos/menu1.png" alt="">.
        </label>
        
        <a href="index.php" class="logo">Craft Crawl Asheville</a>
        <div class="navRight">
            
          <a href="index.php" >Home</a>
                
          <?php if(isset($_SESSION['mem_id'])): ?>
          <a class="nav-links" href="public/members/index.php" style="text-decoration:none">My Progress</a>
          <?php else: ?>
          <a class="nav-links" href="public/breweries.php" style="text-decoration:none">Breweries</a>
          <?php endif; ?>
                
          <a href="#" >Map</a>
          <a href="#" >Contact</a>
      
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
        <a class="back-link" href="index.php">&laquo; Back to Login</a>
        
        <div class="member new">
          <h1>Create Account</h1>
    
          <div class="container">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row">
              <div class="col-25">
                <label for="first_name">First Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="first_name" size="2" maxlength="15" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" placeholder="First Name.." required>
              </div>
            </div> 
            <div class="row">
              <div class="col-25">
                <label for="last_name">Last Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="last_name" name="last_name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" placeholder="Last Name.." required>
              </div>
            </div> 
            <div class="row">
              <div class="col-25">
                <label for="email">Email</label>
              </div>
              <div class="col-75">
                <input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email.." required>
              </div>
            </div> 
            <div class="row" hidden>
              <div class="col-25">
                <label for="member_level">Member Level</label>
              </div>
              <div class="col-75">
                <input type="text" id="member_level" name="member_level" value="m">
              </div>
            </div> 
            <div class="row">
              <div class="col-25">
                <label for="pass_hash">Password</label>
              </div>
              <div class="col-75">
                <input type="password" id="pass_hash" name="pass_hash" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Password.." required>
              </div>
            </div> 
            <?php echo display_errors($errors); ?>
            <div class="row">
              <div class="g-recaptcha" data-sitekey=""></div>
              <input type="submit" name="submit" value="Create Account">
            </div>  
            
          </form>
          </div>
        </div>

      </div>
    </main>
    
    <footer class="footer">
      &copy; <?php echo date('Y'); ?> Craft Crawl Asheville
    </footer>
  </body>
</html>
