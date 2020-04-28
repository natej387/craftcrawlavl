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

  function filterTable($valueToSearch) {
    global $db;
    
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE mem_id LIKE '%". db_escape($db, $valueToSearch)."%' ";
    $sql .= "OR mem_fname LIKE '%". db_escape($db, $valueToSearch)."%' ";
    $sql .= "OR mem_lname LIKE '%". db_escape($db, $valueToSearch)."%' ";
    $sql .= "OR mem_email LIKE '%". db_escape($db, $valueToSearch)."%'";
    $search_results = mysqli_query($db, $sql);
    return $search_results;
  }

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
    $sql .= "'" . db_escape($db, $member['mem_fname']) . "',";
    $sql .= "'" . db_escape($db, $member['mem_lname']) . "',";
    $sql .= "'" . db_escape($db, $member['mem_email']) . "',";
    $sql .= "'" . $hashed_password . "',";
    $sql .= "'" . db_escape($db, $member['mem_level']) . "'";
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
      $errors[] = "Email cannot be blank.";
    } elseif(!has_valid_email_format($member['mem_email'])) {
      $errors[] = "Email not formatted correctly";
    }
    
    if(is_blank($member['mem_level'])) {
      $errors[] = "Member level cannot be blank.";
    } elseif(!has_length($member['mem_level'], ['min' => 0, 'max' => 2])) {
      $errors[] = "Member level issue";
    }
     return $errors;
  }

//insert data into member_progress table
    function insert_progress($visit) {
    global $db;

    $sql = "INSERT INTO member_progress ";
    $sql .= "(mem_id, brew_id) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $visit['mem_id']) . "',";
    $sql .= "'" . db_escape($db, $visit['brew_id']) . "'";
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
  
// matches brewery with secret code
  function brew_by_code($brewCode) {
    global $db;
    $sql = "SELECT * FROM breweries ";
    $sql .="WHERE brew_code='" . db_escape($db, $brewCode) . "'";
    $result = mysqli_query($db, $sql);
    
    $brewID = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $brewID;
  }

//checks for visited/non-visited breweries - also used to check for duplicate secret codes
  function brewStatus($id, $brew_id){
    global $db;
    $sql = "SELECT * from member_progress ";
    $sql .="WHERE mem_id='" . db_escape($db, $id) . "' ";
    $sql .="AND brew_id='" . db_escape($db, $brew_id) . "'";
    $result = mysqli_query($db, $sql);
  
    if(mysqli_num_rows($result) == 1) {
    return true;
      
    } elseif(mysqli_num_rows($result) == 0)  {
    return false;
    } 
    else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

    // visible
    // Make sure we are working with a string
    //$visible_str = (string) $subject['visible'];
    //if(!has_inclusion_of($visible_str, ["0","1"])) {
     // $errors[] = "Visible must be true or false.";
    //}
?>