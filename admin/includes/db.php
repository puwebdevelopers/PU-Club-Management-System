<?php
// Establish database connection.
try{
    // Create a PDO instance
$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} 
catch (PDOException $e){
    // Connection Failed
exit("Error: " . $e->getMessage());
}

//for mysqli
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$conn){
echo 'error';
}
