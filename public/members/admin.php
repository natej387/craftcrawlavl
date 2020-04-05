<?php require_once('../../private/initialize.php'); ?>

<?php
$members = find_all_members();
$id = $_GET['mem_id'] ?? '1'; // PHP > 7.0
//$member = find_member_by_id($id);

require_login();

?>

<?php $page_title = 'administration'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="actions">
      <a class="action" href="<?php echo url_for('/members/admin_create.php'); ?>">Create New Member</a>
    </div>
    

 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
 <div id="myTable" class="Rtable Rtable--6cols">
  
  <div class="Rtable-cell"><h3>ID</h3></div>
  <div class="Rtable-cell"><h3>First Name</h3></div>
  <div class="Rtable-cell"><h3>Last Name</h3></div>
  <div class="Rtable-cell"><h3>Email</h3></div>
  <div class="Rtable-cell"><h3>Level</h3></div>
  <div class="Rtable-cell"><h3>Options</h3></div>
       
  	    

      <?php while($member = mysqli_fetch_assoc($members)) { ?>
      
  <div class="Rtable-cell "><?php echo h($member['mem_id']); ?></div>
  <div class="Rtable-cell srch"><?php echo h($member['mem_fname']); ?></div>
  <div class="Rtable-cell "><?php echo h($member['mem_lname']); ?></div>
  <div class="Rtable-cell "><?php echo h($member['mem_email']); ?></div>
  <div class="Rtable-cell "><?php echo h($member['mem_level']); ?></div>
  <div class="Rtable-cell"><a class="action" href="<?php echo url_for('/members/show.php?id=' . h(u($member['mem_id']))); ?>">View</a>
              <a class="action" href="<?php echo url_for('/members/admin_edit.php?id=' . h(u($member['mem_id']))); ?>">Edit</a>
            <a class="action" href="<?php echo url_for('/members/admin_delete.php?id=' . h(u($member['mem_id']))); ?>">Delete</a></div>
          
      <?php } ?>
   
  	