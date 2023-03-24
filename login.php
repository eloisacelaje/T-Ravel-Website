<?php
	include('config/database.php');

	$_SESSION['location'] = 'login';

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: index.php");
		exit;
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = mysqli_real_escape_string($link, $_POST['username']);
		$pass = mysqli_real_escape_string($link, $_POST['password']);

		$row = array();
		$sql = "SELECT * FROM user WHERE user.username = '$user' AND user.password = '$pass' ";
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION['firstName'] = $row['firstName'];
				$_SESSION['lastName'] = $row['lastName'];
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $row['username'];
                $_SESSION['Contact'] = $row['Contact'];
				$_SESSION['user_id'] = $row['ID'];
					
				header("Location: index.php");
			}
		} else {
			$login_err = "Oops! Incorrect username or password";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Ravel Travel and Tour Agency</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="Assets/bootstrap4/css/bootstrap.min.css">
    <script src="Assets/jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="login">  
		<h2 class="login-header">T-Ravel Agency</h2><br>
		
		<?php 
			if(!empty($login_err)){
				echo '<div class="alert alert-danger text-center error">' . $login_err . '</div>';
			}        
		?>
	    <form id="login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<div class="form-group">
			<label for="user" class="login-label">Username:</label>
			<input type="text" class="form-control inputs" placeholder="Username" name="username" id="username">
		</div>
		<div class="form-group">
			<label for="password" class="login-label">Password:</label>
			<input type="password" class="form-control inputs"  placeholder="Password" name="password" id="password" >
		</div>   
		
		<button type="submit" class="btn btn-outline-primary float-right submit">LOGIN</button>
	    </form>     
	</div>
	<script src="Assets/bootstrap4/js/bootstrap.bundle.min.js"></script>
</body>
</html>