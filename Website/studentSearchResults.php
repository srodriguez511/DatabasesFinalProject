<?php
	include 'top.php';	
	include 'dbconnect.php';  // Works.
	session_start();

	
	echo "<h2> Results </h2>";		
	echo "<br>";
		
	$studentid = $_SESSION['id'];		
			
	$location = $_POST['location'];
	$title = $_POST['title'];
	$salary = $_POST['salary'];
	$degree = $_POST['degree'];
	$description = $_POST['description'];
	$req = $_POST['req'];
	$major = $_POST['major'];
	
	$query = "select * from JobAnnouncements where ";
		
	if($location != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "JobLocation='$location'";
	}
	if($title != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "JobTitle='$title'";
	}	
	if($salary != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "Salary=$salary";
	}
	if($degree != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "Degree='$degree'";
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
	if($req != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "RequisitionNumber='$req'";
	}
	if($description != null)
	{
		$out=preg_split('/\s+/',trim($query)); 
		if(end($out)!='where')
		{
			$query = $query . " and ";
		}
		$query = $query . "Contains(description, '$description')";
	}
	
	$query2 = "select AnnouncementId from Application where StudentId=$studentid";
	
	$result = mssql_query($query);
	$result2 = mssql_query($query2);
	
	$array = array();
	
	while ($row = mssql_fetch_array($result2)) {
		array_push($array, $row['AnnouncementId']);
	}
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		$announcementid = $row['AnnouncementId'];
	
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Job Title:&nbsp&nbsp";
		echo $row['JobTitle'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Job Location:&nbsp&nbsp";
		echo $row['JobLocation'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Salary:&nbsp&nbsp";
		echo $row['Salary'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Degree:&nbsp&nbsp";
		echo $row['Degree'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Requisition Number:&nbsp&nbsp";
		echo $row['RequisitionNumber'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Major:&nbsp&nbsp";
		echo $row['Major'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Date Posted:&nbsp&nbsp";
		echo $row['DatePosted'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<br>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Description:&nbsp&nbsp";
		echo $row['Description'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		if(!(in_array($announcementid, $array)))
		{
			echo "<a href='applyforannouncement.php?announcementid=$announcementid'>Apply!</a>";
		}
		else
		{
			echo "Already Applied!";
		}
		
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='forwardannouncement.php?announcementid=$announcementid'>Forward to Friend!</a>";
		echo "<br><br>";
		$i++;
	}
	include 'bottom.php';
?>