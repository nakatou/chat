<!DOCTYPE html>
<html lang = “ja”>
<head>
 <meta charset = “UFT-8”>
 <title>Chat-Error001</title>
</head>
 
<body>
 <h1>Error</h1>
 
 <?php
 	$code = $_GET["cd"];
 	if($code == 0) echo'Plese input your id and password';
 	if($code == 1) echo'Not found id';
 	if($code == 2) echo'ID or Password is incorrect';
?>
 <form action ='WC101.php' method="get">
 <input type ="submit" value = "back">
</body>
</html>
