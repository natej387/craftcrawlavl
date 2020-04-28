<?php
  require_once('../../private/initialize.php');
  $page_title = 'Create Member'; 
  include(SHARED_PATH . '/header.php');
  require_login();

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
  
      redirect_to('/craftcrawlavl/public/members/admin.php');
  
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

<div id="content">

  <a class="back-link" href="admin.php">&laquo; Back to List</a>

  <h1>Create Member</h1>
  <div class="container member_new">
    <?php echo display_errors($errors); ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="row">
        <div class="col-25">
          <label for="fname">First Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Last Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Member Level</label>
        </div>
        <div class="col-75">
          <input type="text" name="member_level" value="">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Password</label>
        </div>
        <div class="col-75">
          <input type="password" name="pass_hash" value="">
        </div>
      </div>
        <div class="row" id="operations">
          <input type="submit" value="Create Member" />
        </div>
    </form>

   </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
