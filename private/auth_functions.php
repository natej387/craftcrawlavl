<?php

  // Performs all actions necessary to log in
  function loginMember($member) {
  // Renerating the ID protects from session fixation.
    session_regenerate_id();
    session_start();
    $_SESSION['mem_id'] = $member['mem_id'];
    $_SESSION['last_login'] = time();
    $_SESSION['mem_fname'] = $member['mem_fname'];
    $_SESSION['mem_level'] = $member['mem_level'];
    return true;
  }

  // Performs all actions necessary to log out
  function log_out_member() {
    unset($_SESSION['mem_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['mem_email']);
    unset($_SESSION['mem_fname']);
    // session_destroy(); // optional: destroys the whole session
    return true;
  }


  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if an admin
  // is logged in and display another link if they are not)
  function is_logged_in() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['mem_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('../index.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>
