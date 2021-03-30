<?php  
session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['username']);
setcookie('user',"",time()-60*60*24*365,'/');
setcookie('pass',"",time()-60*60*24*365,'/');
setcookie('id',"",time()-60*60*24*365,'/');
setcookie('email',"",time()-60*60*24*365,'/');


header("location:index.php");

?>