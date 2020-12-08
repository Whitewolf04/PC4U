<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
	<title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="account.css" />
</head>
<body>
	<?php
		require_once "../Menu/nav.php";
		if(!isset($_SESSION['signedin']))
		{
			header("Location: ../Menu/signin.php");
			exit;
		}
	?>
        <div class="main">
            <div class="wrap">
				<div class="outer"><div class="sidebar">
                	<a href="account.php">Your profile</a>
                </div></div>
                <div class="content">
					<h3>Change your Password</h3>
					<form action="" method="POST">
						<label>Enter your password:</label><br>
						<input type="password" name="password" placeholder="Enter your password">
						<br><br>
						<input type="password" name="confirm" placeholder="Confirm your password">
						<br><br>
						<label>Enter your new password:</label><br>
						<input type="password" name="newPassword" placeholder="Enter your new password">
						<br><br>
						<input type="submit" name="submit" value="Submit">
					</form>
					<?php
					if(isset($_POST['submit'])){
						$password = $confirm = "";
						if(!(empty($_POST['password'])||empty($_POST['confirm']))){
							if(strcmp($password, $confirm)==0){
								if(preg_match('/[a-z]/', $_POST['newPassword']) && preg_match('/[A-Z]/', $_POST['newPassword']) && preg_match('/[0-9]/', $_POST['newPassword']) && preg_match('/[\ -\/:-@\[-`\{-\~]/', $_POST['newPassword'])){
									$password = $_POST['password'];
									$confirm = $_POST['confirm'];
									checkPassword($password, $_SESSION['signedin'], $_POST['newPassword']);
								}else{
									echo "Your new password must have at least 8 characters, at least 1 lower case character,  at least 1 upper case character,
									and at least one of these special characters(:;<=>?@-[\]^_`{|}~.)";
								}
							}else{
								echo "Password and confirm password do not match. Please Try Again.";
							}
							
						}else{
							echo "One of the fields is missing! Please try again.";
						}
					}
					/**
					 * checks password by looking into accounts.txt and verifying the hashed password with the one given in input
					 */
					function checkPassword($password, $username, $newpassword){
						$hashedpassword = password_hash($newpassword, PASSWORD_DEFAULT);
						if(file_exists("../Database/accounts.txt")){
							$stream = fopen("../Database/accounts.txt", "r");
							while(($line=fgets($stream))!== false){
								if(strpos($line, $username)!==false){
									$realpassword = trim(substr($line ,strpos($line,"\t")+1, strrpos($line,"\t")-strpos($line,"\t")));
									
									//print_r($realpassword."<br>".$password);
									if(password_verify($password,$realpassword)){
										fclose($stream);
										changePassword($realpassword, $hashedpassword);
										echo "Password changed";
									break;
									}else{
										fclose($stream);
										echo "Wrong password. Please try again.";
									break;
									}
								}
							}
						}
					}
					/**
					 * changes the hashed password with new, hashed password
					 */
					function changePassword($oldpassword, $newpassword){
						$content = file_get_contents("../Database/accounts.txt");
						$content = str_replace($oldpassword, $newpassword, $content);
						file_put_contents("../Database/accounts.txt", $content);
					}
					?>
			</div>
		</div>
</body>
</html>