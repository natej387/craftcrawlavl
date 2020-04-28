<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Admin Home'; 
  include(SHARED_PATH . '/header.php');
  require_login();

  if(isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $members  = filterTable($valueToSearch);
  } else {
    $members = find_all_members();
    $id = $_GET['mem_id'] ?? '1'; // PHP > 7.0
  }
?>

<h1>Administration</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <label for="svalue" hidden>Member Search</label>
  <input type="text" id="svalue" name="valueToSearch" placeholder="Search Members"><br><br>
  <input type="submit" name="search" value="Filter"><br><br>
<div style="overflow-x:auto;" id="myTable" class="container">
  <div class="actions">
  <a class="action" href="<?php echo url_for('/members/admin_create.php'); ?>">Create New Member</a>
</div>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Member Level</th>
        <th>Options</th>
      </tr>
    </thead>
    <?php while($member = mysqli_fetch_assoc($members)) { ?>
    <tr>
      <td><?php echo h($member['mem_id']); ?></td>
      <td><?php echo h($member['mem_fname']); ?></td>
      <td><?php echo h($member['mem_lname']); ?></td>
      <td><?php echo h($member['mem_email']); ?></td>
      <td><?php echo h($member['mem_level']); ?></td>
      <td><a class="action" href="<?php echo url_for('/members/admin_edit.php?id=' . h(u($member['mem_id']))); ?>">Edit</a>
      <a class="action" href="<?php echo url_for('/members/admin_delete.php?id=' . h(u($member['mem_id']))); ?>">Delete</a></td>
    </tr>
     <?php } ?>
  </table>
</div>
</form>
