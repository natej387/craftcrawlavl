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
    $_SESSION['mem_fname'] = $member['mem_fname'];
    redirect_to(url_for('members/show.php?id=' . $id));
  } else {
    $errors = $result;
  }
} else {
  $member = find_member_by_id($id);
}

?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member edit">
    <h1>Edit Member</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/members/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($member['mem_fname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
          <dd><input type="text" name="last_name" value="<?php echo h($member['mem_lname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
          <dd><input type="text" name="email" value="<?php echo h($member['mem_email']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
          <dd><input type="text" name="member_level" value="<?php echo h($member['mem_level']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
