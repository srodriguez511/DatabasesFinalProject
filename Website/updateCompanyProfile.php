<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$id = $_SESSION['id'];
	$username = $_POST["username"]; 
	$password = $_POST["password"];
	$name = $_POST["name"]; 
	$location = $_POST["location"]; 
	$industry = $_POST["industry"]; 

	$proc = mssql_init('updatecompanyprofile',$link);
	mssql_bind($proc,'@id',$id, SQLINT4);
	mssql_bind($proc,'@username',$username,SQLVARCHAR);
	mssql_bind($proc,'@password',$password,SQLVARCHAR);
	mssql_bind($proc,'@name',$name,SQLVARCHAR);
	mssql_bind($proc,'@location',$location,SQLVARCHAR);
	mssql_bind($proc,'@industry',$industry,SQLVARCHAR);
	
	$result = mssql_execute($proc);
	
	mssql_free_statement($proc);
	
	echo "Update complete. Click <a href='index.php'>here</a> to proceed  ";
	include 'bottom.php';
?>