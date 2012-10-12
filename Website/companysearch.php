<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();

	$studentid = $_SESSION['id'];
	
	echo "<h2> Student Search </h2>";
	echo "<br>";
		
	echo"<form action='companySearchResults.php' method='post'>";
			echo "University: <input type='text' name='university'  /> <br> <br>";
			echo "Major <input type='text' name='major' /> <br> <br>";
			echo "GPA: <input type='text' name='gpa'  /> <br> <br>";
			echo "<input type='submit' value='Search'/>";
	echo"</form>";
	include 'bottom.php';
?>		
