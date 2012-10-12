<?php	
	$server = 'DNY1PCE10233364\SQLEXPRESS';

	// Connect to MSSQL
	$link = mssql_connect($server, 'test', 'sql2pass');

	if (!$link) {
		die('Something went wrong while connecting to MSSQL');
	}
	
	mssql_select_db('FinalProject', $link) or die('A error occured: ' . mysql_error());
?>