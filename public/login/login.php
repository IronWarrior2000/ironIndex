<?php
	//This is the log in page. The user will have to Log into the page itself.

	require_once("User.php");
	session_start();

	if(isset($_POST['login'])){
		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
		$user = User::getUserLog($username, $password);
		if($user){
			$_SESSION['user_id'] = $user->getId();
				header('Location: writer.php');
				die;
		}  
 		
		else{
			$error = "The Username or Passward was incorrect";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Log-in Page</title>
		<link rel="stylesheet" href="loginbar.css" type="text/css">
		<link rel="stylesheet" href="../global.css" type="text/css">
	</head>
	<body>
		<h2 id="log">Log-In | <a href="../home/home.html" class="log">Home</a> </h2>
			<?php if (isset($error)):  ?>
		 <p><?php print $error; ?></p>
			<?php endif; ?>
		<form method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username">
			<br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			<br>
			<label>Submit:</label>
			<input type="submit" id="login" name="login" value="login">	
		</form>

		


	</body>
</html>