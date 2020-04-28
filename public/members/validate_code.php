<?php
require_once('../../private/initialize.php');
$page_title = 'Member Progress'; 
include(SHARED_PATH . '/header.php');
//require_login();
if (is_logged_in() == false) {
  
  redirect_to(url_for('../login.php')); 
  } else {

  $errors = [];
  if(is_post_request()) {
  
    $brewCode = $_POST['brewCode'];
    $brewID = brew_by_code($brewCode); 
      if($brewID['brew_id'] == 0) {
        $errors[] = "Code is not valid";
      } else {
        $visit = [];
    $visit['mem_id'] = $_SESSION['mem_id'];
    $visit['brew_id'] = $brewID['brew_id'];
    
    
    
    $mem_id = $_SESSION['mem_id'];
    $brew_id = $visit['brew_id'];
    $result = brewStatus($mem_id, $brew_id);
    if($result === true) {
      $errors[] = "Code already used";
    } else {
      insert_progress($visit);
      redirect_to(url_for('members/index.php'));
    }
      }
  }
}
?>
<h1>Brewery Code</h1>
<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     
    <div class="row">
      <div class="col-25">
        <label for="brewCode">Code</label>
      </div>
      <div class="col-75">
        <input type="text" id="brewCode" name="brewCode" placeholder="Enter here..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
    <?php  echo display_errors($errors); ?>
    </form>
</div>
   <?php include(SHARED_PATH . '/footer.php'); ?> 
   