<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();

	echo "<h2> Viewing Profile </h2>";
	echo "<br>";
		
	//call the stored procedure getstudentprofile to retrieve all the information for updating
	$friendid = $_GET['friendid'];
	
	$proc = mssql_init('GetStudentProfile',$link);
	mssql_bind($proc,'@id',$friendid,SQLVARCHAR, false);
	mssql_bind($proc,'@username',$username,SQLVARCHAR, true);
	mssql_bind($proc,'@password',$password,SQLVARCHAR, true);
	mssql_bind($proc,'@name',$name,SQLVARCHAR, true);
	mssql_bind($proc,'@university',$university,SQLVARCHAR, true);
	mssql_bind($proc,'@major',$major,SQLVARCHAR, true);
	mssql_bind($proc,'@gpa',$gpa,SQLFLT8, true);
	
	$result = mssql_execute($proc);
	
	mssql_free_statement($proc);
	
	echo "Name: <input type='text' name='name' value=$name /> <br> <br>";
	echo "University: <input type='text' name='university' value=$university /> <br><br>";
	echo "Major: <input type='text' name='major' value=$major /> <br><br>";
	echo "GPA: <input type='text' name='gpa' value=$gpa /> <br> <br>";	
	include 'bottom.php';
?>		
