<?php
require_once('db_credentials.php');

//database functions
function db_connect() {
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    db_confirm_connect();
    return $conn;
}

function db_disconnect($conn) {
    if(isset($conn)) {
        mysqli_close($conn);
    }
}

function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string); 
}

function db_confirm_connect() {
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function q_select_all($tableName) {
    Global $db;

    $sql = "SELECT * FROM " .$tableName;
    $sql .= " ORDER BY mem_id ASC";
    $result = mysqli_query($db, $sql);
    if(!$result) {
        exit("Database Query failed.");
    }
    return $result;
}

function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>