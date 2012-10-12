<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
	
	//call the stored procedure getstudentprofile to retrieve all his information for updating
	$id = $_SESSION['id'];
	
	$proc = mssql_init('GetStudentProfile',$link);
	mssql_bind($proc,'@id',$id,SQLVARCHAR, false);
	mssql_bind($proc,'@username',$username,SQLVARCHAR, true);
	mssql_bind($proc,'@password',$password,SQLVARCHAR, true);
	mssql_bind($proc,'@name',$name,SQLVARCHAR, true);
	mssql_bind($proc,'@university',$university,SQLVARCHAR, true);
	mssql_bind($proc,'@major',$major,SQLVARCHAR, true);
	mssql_bind($proc,'@gpa',$gpa,SQLFLT8, true);
	
	$result = mssql_execute($proc);
	
	mssql_free_statement($proc);

	echo $university;
	
	echo"<form action='updateStudentProfile.php' method='post'>";
			echo "Username: <input type='text' name='username'  value='".stripslashes($username)."' /> <br> <br>";
			echo "Password: <input type='text' name='password' value='".stripslashes($password)."' /> <br> <br>";
			echo "Name: <input type='text' name='name' value='".stripslashes($name)."' /> <br> <br>";
			echo "University: <input type='text' name='university' value='".stripslashes($university)."'/> <br><br>";
			echo "Major: <input type='text' name='major' value='".stripslashes($major)."' /> <br><br>";
			echo "GPA: <input type='text' name='gpa' value='".stripslashes($gpa)."' /> <br> <br>";
			echo "<input type='submit' value='Update'/>";
	echo"</form>";
	
	include 'bottom.php';
?>		
