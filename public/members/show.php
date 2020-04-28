<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Show Member'; 
  include(SHARED_PATH . '/header.php');
  require_login();

  $id = $_GET['id'] ?? '1'; // PHP > 7.0
  $member = find_member_by_id($id);
?>



<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/admin.php'); ?>">&laquo; Back to List</a>

  <div class="member show">
    
    <h1>Member:</h1>
    
    <div class="container attributes">
      <dl>
        <dt>Memeber ID:</dt>
        <dd><?php echo h($member['mem_id']); ?></dd>
      </dl>
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($member['mem_fname']); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($member['mem_lname']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($member['mem_email']); ?></dd>
      </dl>
      <dl>
        <dt>Level</dt>
        <dd><?php echo h($member['mem_level']); ?></dd>
      </dl>
    </div>  
  </div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
