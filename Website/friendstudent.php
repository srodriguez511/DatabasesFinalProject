<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$studentid = $_GET['studentid'];
	$friendid = $_GET['friendid'];
	$dateposted = PhpTimeToOLEDateTime(time());
	
	$query = "insert into FriendRequests values ($studentid, $friendid, $dateposted)";
	$result = mssql_query($query);
		
	echo "Friend Request Sent!! Click <a href='viewallstudents.php'>here</a> to proceed  ";
	
	function PhpTimeToOLEDateTime($timestamp)
	{
        $a_date = getdate ($timestamp);
        $year= $a_date['year']; //this year
        $partial_days = ($year-1900)*365;//days elapsed since 1-1-1900
        //let's calculate how many 29 february from 1900 to first day on this year
        $partial_days +=(int)(($year-1) / 4); //each 4 years a leap year since year 0
        $partial_days -= (int)(($year-1) / 100); //each 100 years skip a leap
        $partial_days += (int)(($year-1) / 400); //each 400 years add a leap
        $partial_days -= 460; //459 leap years before 1900 + 1 for math (year 0 does not exist)
        $partial_days += $a_date['yday'];

        $seconds = $a_date['hours'] * 3600;
        $seconds += $a_date['minutes'] * 60;
        $seconds += $a_date['seconds'];

        $d = (double) $partial_days;
        $d +=  ((double)$seconds)/86400.0;

        return $d;
	}
	include 'bottom.php';
?>