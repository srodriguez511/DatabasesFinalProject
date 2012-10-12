<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();

	echo "<h2> Create New Message </h2>";
	echo "<br><br>";
	
	$id = $_SESSION['id'];
		
	$query = "select StudentName, StudentId from Students where StudentId in (select StudentId2 from Friendship where StudentId1 = $id)";
	$result = mssql_query($query);
	
	$array = array();
	$arrayid = array();
	
	while ($row = mssql_fetch_array($result)) {
		array_push($array, $row['StudentName']);
		array_push($arrayid, $row['StudentId']);
	}
		
	echo"<form action='sendStudentMessage.php' method='post'>";
			echo "To: ";
			echo"<select name='to'>";
			echo showOptionsDrop($array);
			echo"</select><br>";
			
			$single_value = implode(",", $arrayid);
			echo '<input type=hidden name="single_value" value="'.htmlspecialchars($single_value).'">';
			echo "Title: <input type='text' name='title' /> <br> <br>";
			echo "Message: <textarea name='message' rows='7' cols='40'> </textarea>";
			echo "<br>";
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
