<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');
$page_title = 'Code validate'; 
if(is_post_request()) {
  
$brewCode = $_POST['brewCode'];
$brewID = brew_by_code($brewCode); 
     
$visit = [];
$visit['mem_id'] = $_SESSION['mem_id'];
$visit['brew_id'] = $brewID['brew_id'];

insert_progress($visit);
redirect_to(url_for('members/index.php'));
}
?>

 

<form action="<?php echo url_for('/members/validate_code.php'); ?>" method="post">
      <dl>
        <dt>Brewery Code</dt>
        <dd><input type="text" name="brewCode" value="" /></dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Submit" />
      </div>
    </form>