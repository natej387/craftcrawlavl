<?php
  function find_all_members() {
    global $db;
    
    $sql = "SELECT * FROM members ";
    $sql .= "ORDER BY mem_id ASC";
    $result = mysqli_query($db, $sql);
    return $result;
  }

  function find_member_by_id($id) {
    global $db;
    
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE mem_id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member;
  }

  function find_member_by_email_password(){}

  function find_member_by_email($email) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE mem_email='" . db_escape($db, $email) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $member; // returns an assoc. array 
  }

  function find_all_pages() {
    global $db;
    
    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY mem_id ASC";
    $result = mysqli_query($db, $sql);
  }

  function insert_member($member) {
    global $db;
    
    $hashed_password = password_hash($member['mem_pass_hash'], PASSWORD_BCRYPT);
    
    $errors = validate_member($member);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO members ";
    $sql .= "(mem_fname, mem_lname, mem_email, mem_pass_hash, mem_level) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $member['first_name']) . "',";
    $sql .= "'" . db_escape($db, $member['last_name']) . "',";
    $sql .= "'" . db_escape($db, $member['email']) . "',";
    $sql .= "'" . $hashed_password . "',";
    $sql .= "'" . db_escape($db, $member['member_level']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
  
    if($result) {
    return true;
  
    } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
}
  }

  function update_member($member) {
    global $db;
    
    $errors = validate_member($member);
    if(!empty($errors)) {
      return $errors;
    }
    
    $hashed_password = password_hash($member['mem_pass_hash'], PASSWORD_BCRYPT);

    $sql = "UPDATE members SET ";
    $sql .= "mem_fname='" . db_escape($db, $member['mem_fname']) . "', ";
    $sql .= "mem_lname='" . db_escape($db, $member['mem_lname']) . "', ";
    $sql .= "mem_email='" . db_escape($db, $member['mem_email']) . "', ";
    $sql .= "mem_level='" . db_escape($db, $member['mem_level']) . "' ";
    $sql .= "WHERE mem_id='" . db_escape($db, $member['id']) . "' ";
    $sql .= "LIMIT 1";
  
    $result = mysqli_query($db, $sql);  
    if($result) {
    return true;
    } else {
  
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

  }

  function delete_member($id) {
    global $db;

    $sql = "DELETE FROM members ";
    $sql .= "WHERE mem_id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    
    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function validate_member($member) {
    $errors = [];

    if(is_blank($member['mem_fname'])) {
      $errors[] = "First name cannot be blank.";
    } elseif(!has_length($member['mem_fname'], ['min' => 2, 'max' => 255])) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }
    
    // menu_name
    if(is_blank($member['mem_lname'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif(!has_length($member['mem_lname'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }
    
    if(is_blank($member['mem_email'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_valid_email_format($member['mem_email'])) {
      $errors[] = "Email not formatted correctly";
    }
    
    if(is_blank($member['mem_level'])) {
      $errors[] = "Member level cannot be blank.";
    } elseif(!has_length($member['mem_level'], ['min' => 0, 'max' => 2])) {
      $errors[] = "Member level issue";
    }

    function insert_code($code) {
    global $db;

    $sql = "INSERT INTO members_progress ";
    $sql .= "(mem_id, brew_id, date_time) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $member['first_name']) . "',";
    $sql .= "'" . db_escape($db, $member['last_name']) . "',";
    $sql .= "'" . NOW() . "',";
    $sql .= "'" . db_escape($db, $member['email']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
  
    if($result) {
    return true;
  
    } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }
    
  function brew_by_code($code) {
    global $db;
    $sql = "SELECT brew_id FROM breweries";
    $sql .="WHERE brew_code='" . db_escape($db, $code) . "'";
    $result = mysqli_query($db, $sql);
    return $brew_id;
  }
    
  
  
    
  //SELECT brew_id FROM breweries WHERE brew_code = "party"
    
  //INSERT INTO member_progess (mem_id, brew_id, date_time) VALUES (2, 6, now())  
    
    // position
    // Make sure we are working with an integer
    //$postion_int = (int) $subject['position'];
    //if($postion_int <= 0) {
     // $errors[] = "Position must be greater than zero.";
    //}
    //if($postion_int > 999) {
     // $errors[] = "Position must be less than 999.";
    //}

    // visible
    // Make sure we are working with a string
    //$visible_str = (string) $subject['visible'];
    //if(!has_inclusion_of($visible_str, ["0","1"])) {
     // $errors[] = "Visible must be true or false.";
    //}

    return $errors;
  }
?>