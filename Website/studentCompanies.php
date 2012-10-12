<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$studentid = $_SESSION['id'];
	
	echo "<h2> My Companies </h2>";
	echo "<br>";

	$id = $_SESSION['id'];
		
	$query =  "select * from companies where companyid in ( select companyid from studentfollows where studentid = $id)";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		$companyid = $row['CompanyId'];
		$companyname = $row['CompanyName'];
		
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Company Name:&nbsp&nbsp";
		echo "<a href='viewcompanyprofile.php?companyid=$companyid'>$companyname</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Company Location:&nbsp&nbsp";
		echo $row['Location'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Company Industry:&nbsp&nbsp";
		echo $row['Industry'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='unfollowcompany.php?studentid=$studentid&companyid=$companyid'>Unfollow</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='viewcompanyannouncements.php?companyid=$companyid&companyname=$companyname'>View Announcements</a>";
		echo "<br>";
		$i++;
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>