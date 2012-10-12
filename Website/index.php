<html>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<body>
<div id="wrapper">
<?php
	ini_set('display_errors', 1); 
	ini_set('log_errors', 1); 
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); 
	error_reporting(E_ALL);

	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();
	
	$type = 0;

	echo "<div id='header-wrapper'>";
	echo "	<div id='header'>";
	echo "		<div id='logo'>";
	echo "			<h1><a href='#'>Jobwalla</a></h1>";
	echo "		</div>";
	
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) 
	{
		echo "		<div id='menu'>";
		echo "			<ul>";
		echo "				<li class='current_page_item'><a href='index.php'>Homepage</a></li>";
		echo "				<li><a href='login.php'>Login</a></li>";
		echo "				<li><a href='registerStudent.php'>Register Student</a></li>";
		echo "				<li><a href='registerCompany.php'>Register Company</a></li>";
		echo "			</ul>";
		echo "		</div>";
	}
	else
	{	
		$type = $_SESSION['type'];
		if($type == "1")
		{
			$typeString = " (as Student)";
		}
		else
		{
			$typeString = " (as Company)";
		}
		
		echo "		<div id='menu'>";
		echo "			<ul>";
		echo "				<li class='current_page_item'><a href='#'>Homepage</a></li>";
		echo "				<li><a href='logout.php'>Logout " . $_SESSION['name'] . "</a></li>";
		echo "			</ul>";
		echo "		</div>";
	}	
	echo "	</div>";
	echo "</div>";
	
	echo "<div id='page'>";
	echo "	<div id='page-bgtop'>";
	echo "		<div id='page-bgbtm'>";
	echo "			<div id='content'>";
						echo "<h1><center><B>Welcome to Jobwalla</B></center></h1>";
						
						if($type == "1")
						{		
							include 'studentIndex.php';		
						}
						else if($type == "2")
						{
							include 'companyIndex.php';
						}
	echo "			</div>";
	echo "		</div>";
	echo "	</div>";
	echo "</div>";
?>
</div>
</body>
</html>