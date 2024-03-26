<?php

    //Once the User has Logged on they will be directed to the Writer Page or My account Page. Here they will have the option of going to any of the other pages to get started

    require_once('User.php');

    session_start();
    if(loggedIn()){
    $user = User::getUserById($_SESSION['user_id']);
    }
    else{
        header("Location: login.php");
        die;
    }
    $links = [
        'Home' => '../home/home.html',
        'Pen' => '../pen/pen.html',
        'Index' => '../index/technology.html',
        'Bounty' => '../bounty/bounty.html'
    ];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Log-in Page</title>
		<link rel="stylesheet" href="../global.css" type="text/css">
	</head>
	<body>
		<h2>Welcome to the Writer's Page | <a href="logout.php" class="log">Log Out</a> </h2>
         
		<p>Here you can check out all of the cool stuff you wrote for your bounties, reward collections, and more!</p>

        <img src="city.jpg" alt="city-Image">
    <ul>
        <?php foreach($links as $name => $url){?>
           <li> <a href="<?php echo $url; ?>"><?php echo $name; ?></a></li>
        <?php } ?>
    </ul>
        
	</body>
</html>