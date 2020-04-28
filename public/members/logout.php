<?php
require_once('../../private/initialize.php');
require_login();
log_out_member();

redirect_to(url_for('../../../craftcrawlavl/'));

?>
