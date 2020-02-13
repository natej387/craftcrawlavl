<?php require_once('../../private/initialize.php'); ?>


<?php

$members_set = find_all_members();

?>

<?php $page_title = 'members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <div class="members listing">
    <h1>Members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/new.php'); ?>">Create New Member</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($member = mysqli_fetch_assoc($members_set)) { ?>
        <tr>
          <td><?php echo h($member['mem_id']); ?></td>
          <td><?php echo h($member['mem_fname']); ?></td>
          <td><?php echo h($member['mem_lname']); ?></td>
          <td><?php echo h($member['mem_email']); ?></td>
          <td><a class="action" href="<?php echo url_for('/members/show.php?id=' . h(u($member['mem_id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/members/edit.php?id=' . h(u($member['mem_id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/members/delete.php?id=' . h(u($member['mem_id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  	
  	<?php
      mysqli_free_result($members_set);
    ?>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
