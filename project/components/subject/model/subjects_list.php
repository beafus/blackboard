<?php
if (!defined("true-access"))
{
	die("cannot access");
}
include_once("common.php");


function subjects_getAll()
{

	$subjects = array();

	
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT subjects.Id, Code, Name, Building, Class, Professor, Semester FROM SUBJECTS ";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($subject = mysqli_fetch_array($result))
			{
				$subjects[] = $subject;
			}
		}
	}
	return $subjects;
}

?>