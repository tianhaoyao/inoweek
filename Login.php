<?php
    require("password.php");
     $con = mysqli_connect("2607:fea8:59f:ec56:1049:249f:6986:aaf", "id6809210_ricecustomer", "host12345", "id6809210_employees");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $position, $username, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["position"] = $position;
        $response["username"] = $username;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>