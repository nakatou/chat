<?php
	//Login
	if($_GET["name"]== null || $_GET["password"] == null)
	{
	 //header("LOCATION:ER001.php");
	 header("LOCATION:ER001.php?cd=0");
	 exit(0);
	}
	
	$dsn = 'mysql:dbname=chat;host=127.0.0.1';
	$user ='root';
	$pw = 'H@chiouji1';
	
	$name = $_GET["name"];
	$pass = $_GET["password"];
	
	$sql = sprintf('select * from chatDB where loginid=\'%s\'',$name);
	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$buff =  $sth->fetch();
	
	if($name!=$buff['loginid'])
	{
	 header("LOCATION:ER001.php?cd=1");
	 exit(0);
	}
	
	if($name!=$buff['loginid'] || $pass!=$buff['password'])
	{
	 //header("LOCATION:ER001.php");
	 header("LOCATION:ER001.php?cd=2");
	 exit(0);
	}
	//echo $buff['password'];
	
	$myname = $_GET["name"];
	echo $myname;
?>

<!DOCTYPE html>
<html lang = “ja”>
<head>
 <meta charset = “UFT-8”>
 <title>Chat</title>
</head>
 
<body>
 <form method="post">
  <input type ="text" size = "30" name = "talk">
  <input type ="submit" name="write" value = "Write">
 </form>
 
 <form action="WC101.php">
  <input type="submit" name="logout" value = "Logout">
 </form>
 
 <?php
 
  if(isset($_POST['write']))
  {
 	//write file.
 	$content = $_POST['talk'];
	$content = nl2br($content);
	
	$data ="<p>name:".$myname."</p>"."<p>talk:".$content."</p>"."<hr>\n";
	
	//$data ="<hr>\n";
	//$data = $data."<p>talk:".$content."</p>\n";
	//$data = $data."<p>name:".$myname."</p>\n";
	
	$file = 'log_file.txt';
	$fp = fopen($file,'ab');
	fwrite($fp,$data);
	fclose($fp);
	
	//load file
	$arr_file = file('log_file.txt', FILE_IGNORE_NEW_LINES);
	$num = count($arr_file);
	$num2 =  15;
	if($num2 < $num) $num = $num2;
	$a = 0;
	
	for($i = $num -1; $i >= 0; $i--)
	{
	 $a += 1;
	 echo $a;
	 echo $arr_file[$i]."\n";
	}
  }
 ?>
 
</body>

</html>
