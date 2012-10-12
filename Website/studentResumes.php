<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	

	echo "<h2> My Resumes </h2>";
	echo "<br>";
	
	$id = $_SESSION['id'];
		
	$query = "select * from Resumes where StudentId = $id";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
    {	
		$resumeid = $row['ResumeId'];
	
		echo $i . "&nbsp&nbsp";
		
		echo "Date Added:&nbsp";
		echo $row['DateAdded'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "Resume:&nbsp";
		echo $row['Resume'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "<br><br>";
		
		$i++;
	}
		
	mssql_free_result($result); 	
	
	echo "<br><br>";
	echo "Paste a new resume below";
	
	echo"<form action='addResume.php' method='post'>";
			echo "<textarea name='resume' rows='7' cols='40'> </textarea>";
			echo "<br>";
			echo "<input type='submit' value='Update'/>";
	echo"</form>";
	include 'bottom.php';
?>