<?php require_once('private/initialize.php'); ?>







<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>


<?php
if ( empty($mem_id)){
  session_destroy();
  include('login.php');
} else {
  include('/public/members/index.php');
}
?>