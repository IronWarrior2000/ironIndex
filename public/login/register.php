<?php
    //This is the register page. The user will have to Log into the page itself.
    
    require_once("User.php");
	
	session_start();
    if(loggedIn()){
        header('Location: writer.php');
        die;
    }
    $messages = [];
    if(isset($_POST['register'])){
        $username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
        $verification = $_POST['verification'] ?? '';
    
        if(!User::isUsernameGood($username)){
            $messages[] ="Username is Not Good";
        }
        
        if($password !== $verification){
            $messages[] = "Password does not Match";
        }

        if(count($messages) === 0){
            User::createNewUser($username, $password);
            $user = User::getUserLog($username, $password);
            $_SESSION['user_id'] = $user->getId();
            header('location: writer.php');
            die;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
		<link rel="stylesheet" href="loginbar.css" type="text/css">
        <link rel="stylesheet" href="../global.css" type="text/css">
	</head>
	<body>
		<h2 id="log">Register | <a href="../home/home.html" class="log">Home</a></h2>
			<?php foreach ($messages as $errors):  ?>
                <h2><?php print $errors; ?></h2>
            <?php endforeach; ?>
		<form method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username">
			<br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
            <br>
            <label for="verification">Confirm Password:</label>
			<input type="password" id="verification" name="verification">
			<br>
			<label>Submit:</label>
			<input type="submit" id="register" name="register" value="Sign-Up">
		</form>
    </body>
</html>