<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management</title>
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

	<script src="js/typed.min.js"> </script> 

	<script> 
        if ($(".slider-title").length == 1) { 
              
            var typed_strings =  
                $(".slider-title-items").text(); 
  
            var typed = new Typed(".slider-title", { 
                strings: typed_strings.split(", "), 
                typeSpeed: 50, 
                loop: true, 
                backDelay: 900, 
                backSpeed: 30, 
            }); 
        } 
    </script> 
</head>
<body>
	<header>
		<img class="logo" src="img/logo.png" alt="">
	</header>
	<div class="container index-page">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="element"></h1>

				<div class="container">
					<div class="row">
						<div class="col-6">
							<button class="btn btn-success" onclick="window.open('input.php', '_self')">Add Student</button>
						</div>
						<div class="col-6">
							<form method="get" class="form-search">
								<input class="form-control py-2" name="s" type="search" id="example-search-input" placeholder="Tìm kiếm theo tên">
								<i class="fas fa-search"></i>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location:loginForm.html");
}

if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from student where fullname like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from student';
}

$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['fullname'].'</td>
			<td>'.$std['birthday'].'</td>
			<td>'.$std['address'].'</td>
			<td><a href="detail.html" class="btn btn-info">Detail</a></td>
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
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


	<script type="text/javascript">
		var typed = new Typed('.element', {
			strings: ["Quản lý thông tin sinh viên"],
			typeSpeed: 50
		});

		function deleteStudent(id) {
			option = confirm('Bạn có muốn xoá sinh viên này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_student.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>