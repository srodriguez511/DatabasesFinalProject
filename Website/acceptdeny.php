<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
				
	$studentid = $_GET['studentid'];
	$friendid = $_GET['friendid'];
	$choice = $_GET['choice'];
	
	//accept
	if($choice == 1)
	{
		$query = "insert into Friendship values ($studentid, $friendid)";
		$query2 = "insert into Friendship values ($friendid, $studentid)";
		$query3 = "delete from friendrequests where studentrequestingid=$friendid and studentintendedid=$studentid";
		
		$result = mssql_query($query);
		$result2 = mssql_query($query2);
		$result3 = mssql_query($query3);
		
		echo "Friendship Accepted! Click <a href='studentFriendRequests.php'>here</a> to proceed  ";
	}
	//denied
	else if($choice == 2)
	{
		$query3 = "delete from friendrequests where studentrequestingid=$friendid and studentintendedid=$studentid";
		$result3 = mssql_query($query3);
		
		echo "Friendship Denied! Click <a href='studentFriendRequests.php'>here</a> to proceed  ";
	}
	include 'bottom.php';
	
?>