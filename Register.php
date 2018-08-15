<?php
    require("password.php");
    $connect = mysqli_connect("localhost", "id6809210_ricecustomer", "host12345", "id6809210_employees");
    
$name = $_POST["name"];
    $position = $_POST["position"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = mysqli_prepare($con, "INSERT INTO user (name, username, age, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $username, $position, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>