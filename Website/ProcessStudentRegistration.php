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
					<?php
						include 'dbconnect.php';  // Works.
							
						$username = $_POST["username"]; 
						$password = $_POST["password"];
						$name = $_POST["name"]; 
						$university = $_POST["university"]; 
						$major = $_POST["major"]; 
						$gpa = $_POST["gpa"];
							
						$proc = mssql_init('RegisterStudent',$link);
						mssql_bind($proc,'@username',$username,SQLVARCHAR);
						mssql_bind($proc,'@password',$password,SQLVARCHAR);
						mssql_bind($proc,'@name',$name,SQLVARCHAR);
						mssql_bind($proc,'@university',$university,SQLVARCHAR);
						mssql_bind($proc,'@major',$major,SQLVARCHAR);
						mssql_bind($proc,'@gpa',$gpa,SQLFLT8);
						
						$result = mssql_execute($proc);
						
						mssql_free_statement($proc);

						echo "Registration complete. Click here to proceed to <a href='login.php'>login</a>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
