<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();

	echo "<h2> Forward Announcement </h2>";
	echo "<br>";
	
	$id = $_SESSION['id'];
	$announcementId = $_GET['announcementid'];
		
	$query = "select StudentName, StudentId from Students where StudentId in (select StudentId2 from Friendship where StudentId1 = $id)";
	$result = mssql_query($query);
	
	$array = array();
	$arrayid = array();
	
	while ($row = mssql_fetch_array($result)) {
		array_push($array, $row['StudentName']);
		array_push($arrayid, $row['StudentId']);
	}
		
	echo"<form action='sendStudentAnnouncement.php' method='post'>";
	echo"<select name='to'>";
	echo showOptionsDrop($array);
	echo"</select><br>";
	
	$single_value = implode(",", $arrayid);
	echo '<input type=hidden name="single_value" value="'.htmlspecialchars($single_value).'" />';
	echo "<input type=hidden name='announcementId' value=$announcementId />";
	echo "<input type='submit' value='Send'/>";
	echo"</form>";
	
	function showOptionsDrop($arr){
        $string = '';
        foreach($arr as $k => $v){
            $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
        }
        return $string;
    }
	include 'bottom.php';
?>		
