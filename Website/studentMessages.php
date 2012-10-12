<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	echo "<h2> My Messages </h2>";
	
	echo "<br>";
	echo "<a href='createstudentmessage.php'>Create New Message</a>";
	echo "<br><br>";

	$id = $_SESSION['id'];
		
	$query = "select * from StudentMessages where RecptStudentId = $id";
	
	$result = mssql_query($query);
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
    {
		$origid =  $row['OrigStudentId'];
		$query2 = "select StudentName from Students where studentid = $origid";
				
		$result2 = mssql_query($query2);
		$row2 = mssql_fetch_array($result2);
			
		echo "From:&nbsp";
		echo $row2['StudentName'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Time:&nbsp";
		echo $row['Timestamp'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Title:&nbsp";
		echo $row['Title'];
		//link the name to the students profile and post back the id
		
		mssql_free_result($result2);
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>