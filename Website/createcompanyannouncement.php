<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	

	echo "<h1> Create New Announcement </h1>";
		echo "<br>";
	
	echo"<form action='processcompanyannouncement.php' method='post'>";
			echo "Job Title: <input type='text' name='jobtitle' /> <br> <br>";
			echo "Job Location: <input type='text' name='joblocation' /> <br> <br>";
			echo "Salary: <input type='text' name='salary' /> <br> <br>";
			echo "Degree: <input type='text' name='degree'  /> <br><br>";
			echo "Major: <input type='text' name='major'  /> <br><br>";
			echo "Requisition Number: <input type='text' name='reqnumber'  /> <br><br>";
			echo "Description: ";
			echo "<textarea name='description' rows='5' cols='30'></textarea> <br><br>";
			echo "<input type='submit' />";
	echo"</form>";
	include 'bottom.php';
?>