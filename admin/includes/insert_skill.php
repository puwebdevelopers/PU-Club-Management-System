<?php
include('config.php');
include('db.php');

    $data = array(
 ':uid'  => $_POST["uid"],
 ':skill'  => $_POST["skill"],
 ':level'  => $_POST["level"]
); 
	
   $query = "INSERT INTO skills (uid,skill,level) VALUES (:uid, :skill,:level)";

$statement = $pdo->prepare($query);

if($statement->execute($data))
{
 $output = array(
  'uid' => $_POST['uid'],
  'skill'  => $_POST['skill'],
  ':level'  => $_POST["level"]
 );

 echo json_encode($output);
}else{
    echo 'error';
}
?>