<?php

include('config.php');
 include('db.php');
	
	session_start();

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../index.php');
		exit();
	}

   
    
    $_SESSION['username'] = $username;

    $id = $_SESSION['username'];



    $sql ='SELECT * FROM members WHERE id:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $admin = $stmt->fetch();


?>