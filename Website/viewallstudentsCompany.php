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
						ini_set('display_errors', 1); 
						ini_set('log_errors', 1); 
						ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); 
						error_reporting(E_ALL);
						
						include 'dbconnect.php';  // Works.
							// Select the database 'php'
						
						session_start();	
													
						echo "<a href='companysearch.php'>Search For Students </a> ";
						echo "<br><br>";

						$id = $_SESSION['id'];
							
						$query = "select * from Students";
						
						$result = mssql_query($query);
						
						$i = 1;
						
						while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
						{	
							//id of the student in the list if we want to friend them
							$studentid = $row['StudentID'];
							
							echo $i . ":";
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
							echo "Student Name:&nbsp&nbsp";
							echo $row['StudentName'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "University:&nbsp&nbsp";
							echo $row['University'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<a href='sendannouncement.php?studentid=$studentid'>Send Announcement</a>";
							echo "<br>";
							$i++;
						}
						
						mssql_free_result($result); 	
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>