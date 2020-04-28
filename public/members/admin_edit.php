<?php
  require_once('../../private/initialize.php');
  $page_title = 'Edit Member'; 
  include(SHARED_PATH . '/header.php');
  require_login();
  $id = $_GET['id'] ?? '1';

  if(is_post_request()) {
  
    $member = [];
    $member['id'] = $id;
    $member['mem_fname'] = $_POST['first_name'] ?? '';
    $member['mem_lname'] = $_POST['last_name'] ?? '';
    $member['mem_email'] = $_POST['email'] ?? '';
    $member['mem_level'] = $_POST['member_level'] ?? '';

    $result = update_member($member);
    if($result === true) {
      redirect_to(url_for('/members/admin.php'));
  
    } else {
      $errors = $result;
    }
  
  } else {
    $member = find_member_by_id($id);
  }
?>

<div id="content">

  

    <h1>Edit Member</h1>
    <div class="container member_edit">
      <a class="back-link" href="<?php echo url_for('/members/admin.php'); ?>">&laquo; Back to List</a>
   
    <form action="<?php echo htmlspecialchars(url_for('/members/admin_edit.php?id=' . h(u($id)))); ?>" method="post">
      <div class="row">
        <div class="col-25">
          <label for="fname">First Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="first_name" value="<?php echo h($member['mem_fname']); ?>">
        </div>
      </div>  
      <div class="row">
        <div class="col-25">
          <label for="fname">Last Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="last_name" value="<?php echo h($member['mem_lname']); ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" name="email" value="<?php echo h($member['mem_email']); ?>">
        </div>
      </div> 
      <div class="row">
        <div class="col-25">
          <label for="fname">Member Level</label>
        </div>
        <div class="col-75">
          <input type="text" name="member_level" value="<?php echo h($member['mem_level']); ?>">
        </div>
      </div>
      <?php echo display_errors($errors); ?>
      <div class="row" id="operations">
        <input type="submit" value="Edit Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
