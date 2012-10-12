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
				</ul>
			</div>
		</div>
	</div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<?php
						include 'dbconnect.php';  // Works.
						session_start();
						
						if(isset($_SESSION['id']))
						{
							$studentid = $_SESSION['id'];				
							$companyid = $_GET['companyid'];
													
							$query = "select * from Companies where CompanyId=$companyid";
							$result = mssql_query($query);
							
							$query2 = "select CompanyId from StudentFollows where StudentId=$studentid";
							$result2 = mssql_query($query2);
							
							$arrayid = array();
							while ($row = mssql_fetch_array($result2)) {
								array_push($arrayid, $row['CompanyId']);
							}
							
							while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
							{	
								$name = $row['CompanyName'];
								$location = $row['Location'];
								$industry = $row['Industry'];
							
								echo"<form>";
									echo "Name: <input type='text' name='name' value='".stripslashes($name)."' /> <br> <br>";
									echo "Location: <input type='text' name='location' value='".stripslashes($location)."' /> <br><br>";
									echo "Industry: <input type='text' name='industry' value='".stripslashes($industry)."' /> <br><br>";			
								echo"</form>";
								
								if(!(in_array($companyid, $arrayid)))
								{
									echo "<a href='followcompany.php?studentid=$studentid&companyid=$companyid'>Follow</a>";
								}
							}
						}
						else
						{
							echo "Please login";
						}
						
						
						
					?>		
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>