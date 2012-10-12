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
					
						echo "<a href='createcompanyannouncement.php'>Create New Announcement</a>";
						
						echo "<br><br><br>";
						
						$id = $_SESSION['id'];
							
						$query = "select * from JobAnnouncements where CompanyId = $id";
						
						$result = mssql_query($query);
						
						$i = 1;
						
						while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
						{		
							echo $i . ":";
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
							echo "Job Title:&nbsp&nbsp";
							echo $row['JobTitle'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "Date:&nbsp&nbsp";
							echo $row['DatePosted'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
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