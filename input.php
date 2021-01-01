<?php
require_once ('dbhelp.php');

$s_fullname = $s_birthday = $s_address = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['fullname'])) {
		$s_fullname = $_POST['fullname'];
	}

	if (isset($_POST['birthday'])) {
		$s_birthday = $_POST['birthday'];
	}

	if (isset($_POST['address'])) {
		$s_address = $_POST['address'];
	}

	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	$s_fullname = str_replace('\'', '\\\'', $s_fullname);
	$s_birthday      = str_replace('\'', '\\\'', $s_birthday);
	$s_address  = str_replace('\'', '\\\'', $s_address);
	$s_id       = str_replace('\'', '\\\'', $s_id);

	if ($s_id != '') {
		//update
		$sql = "update student set fullname = '$s_fullname', birthday = '$s_birthday', address = '$s_address' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into student(fullname, birthday, address) value ('$s_fullname', '$s_birthday', '$s_address')";
	}

	// echo $sql;

	execute($sql);

	header('Location: index.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_fullname = $std['fullname'];
		$s_birthday      = $std['birthday'];
		$s_address  = $std['address'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/mystyle.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<img class="logo" src="img/logo.png" alt="">
	</header>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Student</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Name:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$s_fullname?>">
					</div>
					<div class="form-group">
					  <label for="birthday">birthday:</label>
					  
					  <input type="date" class="form-control" id="birthday" name="birthday" value="<?=$s_birthday?>">

					</div>
					<div class="form-group">
					  <label for="address">Address:</label>
					  <input type="text" class="form-control" id="address" name="address" value="<?=$s_address?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="center-div">
			<div class="box-icon">
			<a href="https://www.hunre.edu.vn/">
			<i class="fab fa-instagram"></i>
			</a>
			<a href="https://www.hunre.edu.vn/">
			<i class="fab fa-facebook"></i>
			</a>
			<a href="https://www.hunre.edu.vn/">
			<i class="fab fa-twitter"></i>
			</a>

			</div>
			<div class="flex">
				<a href="https://www.hunre.edu.vn/">Home</a>
				<span>|</span>
				<a href="index.php">Index</a>
				<span>|</span>
				<a href="input.php">Add Student</a>
				<span>|</span>
				<a href="logout.php">Logout</a>
			</div>
			<span class="copyright">© 2020 NNHT</span>
		</div>
	</footer>
</body>
</html>