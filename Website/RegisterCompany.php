<html>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Jobwalla</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Homepage</a></li>
					<li><a href='login.php'>Login</a></li>
					<li><a href='registerStudent.php'>Register Student</a></li>
					<li><a href='registerCompany.php'>Register Company</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<h4>Register as a Company</h4>
					<form action="ProcessCompanyRegistration.php" method="post">
						Username: <input type="text" name="username" /> <br> <br>
						Password: <input type="text" name="password" /> <br> <br>
						Company Name: <input type="text" name="companyname" /> <br> <br>
						Location: <input type="text" name="location" /> <br><br>
						Industry: <input type="text" name="industry" /> <br><br>
						<input type="submit" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
