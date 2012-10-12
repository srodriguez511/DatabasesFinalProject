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
						
						$companyid = $_SESSION['id'];
						$id = $_SESSION['id'];
							
						$query =  "select Students.StudentName, Students.University, Resumes.ResumeId, Resumes.StudentId, jobannouncements.jobtitle from application 
									inner join jobannouncements on application.announcementid = jobannouncements.announcementid
									inner join resumes on resumes.resumeid = application.resumeid
									inner join Students on Students.Studentid = resumes.studentid
									where companyid = $companyid";

						
						$result = mssql_query($query);
						
						$i = 1;
						
						while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
						{	
							$resumeid = $row['ResumeId'];
							$StudentName = $row['StudentName'];
							
							echo $i . ":";
							
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "Job Title:&nbsp&nbsp";
							echo $row['jobtitle'];
							
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
							echo "Student Name:&nbsp&nbsp";
							echo $StudentName;
							
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "University:&nbsp&nbsp";
							echo $row['University'];
							
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<a href='viewstudentresume.php?resumeid=$resumeid'>View Resume</a>";
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