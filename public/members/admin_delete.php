<?php
  require_once('../../private/initialize.php');
  $page_title = 'Delete Member'; 
  include(SHARED_PATH . '/header.php');
  require_login();

  if(!isset($_GET['id'])) {
    redirect_to(url_for('/members/index.php')); 
  }

  $id = $_GET['id'] ?? '1';

  if(is_post_request()) {
    $result = delete_member($id);
    redirect_to(url_for('/members/admin.php'));

  } else {
    $member = find_member_by_id($id);
  }
?>

<h1>Delete Member</h1>
<div class="container">
  <a class="back-link" href="<?php echo url_for('/members/admin.php'); ?>">&laquo; Back to List</a>
  <form action="<?php echo url_for('/members/admin_delete.php?id=' . h(u($member['mem_id']))); ?>" method="post">
    <p>Are you sure you want to delete this member?</p>
    <p class="item">ID: <?php echo h($member['mem_id']); ?></p>
    <p class="item">First Name: <?php echo h($member['mem_fname']); ?></p>
    <p class="item">Last Name: <?php echo h($member['mem_lname']); ?></p>
    <p class="item">Email: <?php echo h($member['mem_email']); ?></p>
      <div class="row">
        <input type="submit" name="commit" value="Delete Member" />
     </div>
    </form>
  </div>



<?php include(SHARED_PATH . '/footer.php'); ?>
