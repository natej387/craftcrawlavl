<?php

require_once('../../private/initialize.php');
$id = $_GET['id'] ?? '1';
if(is_post_request()) {

$member = [];

$member['first_name'] = $_POST['first_name'] ?? '';
$member['last_name'] = $_POST['last_name'] ?? '';
$member['email'] = $_POST['email'] ?? '';
$member['member_level'] = $_POST['member_level'] ?? '';
$member['pass_hash'] = $_POST['pass_hash'] ?? '';

  $result = insert_member($member);
  if($result === true) {
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/members/show.php?id=' . $new_id));
  
} else {
  $errors = $result;
  }
} else {
  // display the blank form
  $member = [];
  $member['mem_fname'] = '';
  $member['mem_lname'] = '';
  $member['mem_email'] = '';
  $member['mem_level'] = '';
  $member['mem_pass_hash'] = '';
}

?>


<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member new">
    <h1>Create Member</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/members/new.php'); ?>" method="post">
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="" /></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="" /></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="pass_hash" value="" /></dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Create Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
