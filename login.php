<?php 
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

	if(isset($_POST['email']) && isset($_POST['password'])){
		$conn = mysqli_connect('localhost','root','','anandsangeet');
		$qry1 = "select * from admin where email='".$_POST['email']."' and password = '".$_POST['password']."'";
		$qry2 = "select * from admin where email='".$_POST['email']."'";
		$result1 = mysqli_query($conn,$qry1);
		$result2 = mysqli_query($conn,$qry2);
		
		if(empty($_POST['email']) || empty($_POST['password'])){
			session_unset();
			$_SESSION['error'] = 'Please fill email and password both fields';
		}
		elseif($result1){
			session_unset();
			$_SESSION['admin'] = '1';
			echo "<script>window.location = 'index.php'</script>";
		}
		elseif($result2){
			session_unset();
			$_SESSION['warning'] = 'Email ID or Password is incorrect, please check again';

		}
		else{
			session_unset();
			$_SESSION['warning'] = 'You are not registered yet, please contact to admin support';
		}

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $_POST['password'];
	}
	else{
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['error']);
		unset($_SESSION['success']);

	}

 ?>

 
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
	<?php 
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
		echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
	}
	elseif (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
		echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
	}
	elseif (isset($_SESSION['warning']) && !empty($_SESSION['warning'])) {
		echo "<div class='alert alert-warning'>".$_SESSION['warning']."</div>";
	}
	?>

	<form method="post" action="login.php">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])) echo htmlentities($_SESSION['email']) ?>">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php if(isset($_SESSION['password']) && !empty($_SESSION['password'])) echo htmlentities($_SESSION['password']) ?>">
	  </div>
	  <div class="form-group form-check">
	    <input type="checkbox" class="form-check-input" id="" name="remember_me">
	    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
	  </div>
	  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>
</html>
