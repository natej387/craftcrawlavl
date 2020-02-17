<?php

require_once('private/initialize.php');

if(is_post_request()) {

$member = [];

$member['mem_fname'] = $_POST['first_name'] ?? '';
$member['mem_lname'] = $_POST['last_name'] ?? '';
$member['mem_email'] = $_POST['email'] ?? '';
$member['mem_pass_hash'] = $_POST['pass_hash'] ?? '';
$member['mem_level'] = $_POST['member_level'] ?? '';

  $result = insert_member($member);
  if($result === true) {
  $new_id = mysqli_insert_id($db);
  
  redirect_to('/craftcrawlavl/');
  
} else {
  $errors = $result;
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


<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="index.php">&laquo; Back to Login</a>

  <div class="member new">
    <h1>Create Member</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="create.php" method="post">
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
