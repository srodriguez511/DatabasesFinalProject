<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();

	$studentid = $_SESSION['id'];

	echo "<h2> Announcement Search </h2>";
	echo "<br>";
		
	echo"<form action='studentSearchResults.php' method='post'>";
			echo "Job Location: <input type='text' name='location'  /> <br> <br>";
			echo "Job Title: <input type='text' name='title' /> <br> <br>";
			echo "Salary: <input type='text' name='salary'  /> <br> <br>";
			echo "Degree: <input type='text' name='degree' /> <br><br>";
			echo "Description: <input type='text' name='description'  /> <br><br>";
			echo "RequisitionNumber: <input type='text' name='req' /> <br> <br>";
			echo "Major: <input type='text' name='major'  /> <br> <br>";
			echo "<input type='submit' value='Search'/>";
	echo"</form>";
	include 'bottom.php';
?>		
