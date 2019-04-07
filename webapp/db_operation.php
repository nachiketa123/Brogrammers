<?php
class DBOperation
{
	public $con;
	function __construct()
	{
		require_once('connection.php');		
	}
	function insertText($text)
	{
		$db = new Connection();
		$con = $db->connect_db();
		$query = "Insert into ".TABLE_DATA." VALUES('$text');";
		mysqli_query($con,$query);
		if(mysqli_error($con))
		{
			echo(mysqli_error($con));
			exit();
		}
		echo('value inserted');
	}
	function updateText($text)
	{
		$db = new Connection();
		$con = $db->connect_db();
		$query = "update ".TABLE_DATA." set text = '$text';";
		mysqli_query($con,$query);
		if(mysqli_error($con))
		{
			echo(mysqli_error($con));
			exit();
		}
		//echo('value updated');
	}
	function getTextFromTable()
	{
		$db = new Connection();
		$con = $db->connect_db();
		$query = "select text from ".TABLE_DATA." ;";
		$result = mysqli_query($con,$query);
		$text;
		while($row=mysqli_fetch_row($result))
		{
			$text = $row[0];
		}
		if(mysqli_error($con))
		{
			echo(mysqli_error($con));
			exit();
		}
		return $text;
	}
}	
	
?>