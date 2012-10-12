<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$id = $_SESSION['id'];
	$id2 = $_GET['friendid'];
	
	$query = "delete from friendship where StudentId1=$id and StudentId2=$id2";
	$query2 = "delete from friendship where StudentId1=$id2 and StudentId2=$id";
	
	$result = mssql_query($query);
	$result2 = mssql_query($query2);	
		
	echo "Unfriended! Click <a href='studentFriends.php'>here</a> to proceed  ";
	include 'bottom.php';
?>