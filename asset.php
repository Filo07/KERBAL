<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="kerbal";
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function isLevel($level){
    if(isset($_SESSION['userlevel'])){          
        if(intval($_SESSION['userlevel'])>=$level){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function fix($str_raw){
    $str_raw=trim($str_raw);
    $str_raw=stripslashes($str_raw);
    $str_raw=htmlspecialchars($str_raw); 
    return $str_raw;
}

function isUserTaken($username){
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT username FROM tbl_kerbal WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}
?>