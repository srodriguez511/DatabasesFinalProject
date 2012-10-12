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
					<li><a href='logout.php'>Logout</a></li>
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
						session_start();
						
						//call the stored procedure getstudentprofile to retrieve all his information for updating
						$id = $_SESSION['id'];
						
						$proc = mssql_init('GetCompanyProfile',$link);
						mssql_bind($proc,'@id',$id,SQLVARCHAR, false);
						mssql_bind($proc,'@username',$username,SQLVARCHAR, true);
						mssql_bind($proc,'@password',$password,SQLVARCHAR, true);
						mssql_bind($proc,'@name',$name,SQLVARCHAR, true);
						mssql_bind($proc,'@location',$location,SQLVARCHAR, true);
						mssql_bind($proc,'@industry',$industry,SQLVARCHAR, true);
						
						$result = mssql_execute($proc);
						
						mssql_free_statement($proc);
						
						echo"<form action='updateCompanyProfile.php' method='post'>";
								echo "Username: <input type='text' name='username'  value='".stripslashes($username)."' /> <br> <br>";
								echo "Password: <input type='text' name='password' value='".stripslashes($password)."' /> <br> <br>";
								echo "Name: <input type='text' name='name' value='".stripslashes($name)."' /> <br> <br>";
								echo "Location: <input type='text' name='location' value='".stripslashes($location)."' /> <br><br>";
								echo "Industry: <input type='text' name='industry' value='".stripslashes($industry)."' /> <br><br>";
								echo "<input type='submit' value='Update'/>";
						echo"</form>";
						
					?>		
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>