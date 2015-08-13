<?php
if (!defined("true-access"))
{
	die("cannot access");
}
include_once("common.php");


function students_getAll()
{
	
	$students = array();
	list($dbc,$error) = connect_to_database();

	if ($dbc)
	{
		
		
		$query = "SELECT users.Id, username, password, FirstName, LastName, Email, Type FROM USERS ";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($student = mysqli_fetch_array($result))
			{
				$students[] = $student;
			}
		}
	}
	return $students;
}

?>