<?php require_once('../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
require_login();
$member = find_member_by_id($id);

?>

<?php $page_title = 'Show Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member show">
    
    <h1>Member:</h1>
    
    <div class="attributes">
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

    Member ID: <?php echo h($id); ?>

  </div>

</div>
