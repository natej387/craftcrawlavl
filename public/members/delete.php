<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php')); 
}

$id = $_GET['id'] ?? '1';

if(is_post_request()) {

  $result = delete_member($id);
  redirect_to(url_for('/members/index.php'));

} else {
  $member = find_member_by_id($id);
}

?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member delete">
    <h1>Delete Member</h1>
    <p>Are you sure you want to delete this member?</p>
    <p class="item"><?php echo h($member['first_name']); ?></p>
    <p class="item"><?php echo h($member['last_name']); ?></p>

    <form action="<?php echo url_for('/members/delete.php?id=' . h(u($member['member_ID']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Member" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
