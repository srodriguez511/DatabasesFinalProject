<?PHP

include 'dbconnect.php';  // Works.

$uname = "";
$pword = "";
$errorMessage = "";
//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	$database = 'FinalProject';
	$db_found = mssql_select_db($database, $link);

	if ($db_found) {

		//$uname = quote_smart($uname, $link);
		//$pword = quote_smart($pword, $link);		
		$SQL = "SELECT * FROM RegisteredStudents WHERE Username='$uname' and Password='$pword'";
		$SQL2 = "SELECT * FROM RegisteredCompanies WHERE Username='$uname' and Password='$pword'";
			
		$result = mssql_query($SQL);
		$result2 = mssql_query($SQL2);
		
		$num_rows = mssql_num_rows($result);
		$num_rows2 = mssql_num_rows($result2);

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result || $result2) {
			if ($num_rows > 0) 
			{
				$SQL = "SELECT studentid FROM RegisteredStudents WHERE Username='$uname' and Password='$pword'";
				$result = mssql_query($SQL);
				$row = mssql_fetch_array($result);
				
				session_start();
				$_SESSION['login'] = "1";
				$_SESSION['name'] = $uname;
				$_SESSION['id'] = $row[0];
				$_SESSION['type'] = "1"; //student;
				header ("Location: index.php");
			}
			else if($num_rows2 > 0)
			{
				$SQL = "SELECT companyid FROM RegisteredCompanies WHERE Username='$uname' and Password='$pword'";
				$result = mssql_query($SQL);
				$row = mssql_fetch_array($result);
			
				session_start();
				$_SESSION['login'] = "1";
				$_SESSION['name'] = $uname;
				$_SESSION['id'] =  $row[0];
				$_SESSION['type'] = "2"; //company;
				header ("Location: index.php");
			}
			else {
				$errorMessage = "Invalid login!";
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mssql_close($link);

	}

	else {
		$errorMessage = "Error logging on";
	}

}


?>


<html>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Jobwalla</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Homepage</a></li>
					<li><a href='login.php'>Login</a></li>
					<li><a href='registerStudent.php'>Register Student</a></li>
					<li><a href='registerCompany.php'>Register Company</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<?php echo $errorMessage; echo "<br><br>" ?>
					<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

					Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
					Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

					<P align = center>
					<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
					</P>

					</FORM>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>