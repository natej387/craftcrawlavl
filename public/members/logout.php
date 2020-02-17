<?php
require_once('../../private/initialize.php');

//unset($_SESSION['email']);
// or you could use
// $_SESSION['username'] = NULL;

log_out_member();

redirect_to(url_for('../../../craftcrawlavl/'));

?>
