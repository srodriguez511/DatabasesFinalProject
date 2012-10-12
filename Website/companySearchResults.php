<?php
	include 'top.php';	
	include 'dbconnect.php';  // Works.
	session_start();
			
	echo "<h2> Results </h2>";	
	echo "<br>";
						
	$university = $_POST['university'];
	$major = $_POST['major'];
	$gpa = $_POST['gpa'];
	
	$query = "select * from Students where ";
		
	if($university != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "University='$university'";
	}
	if($major != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "Major='$major'";
	}
	if($gpa != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "GPA>=$gpa";
	}
	
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
	include 'bottom.php';
?>