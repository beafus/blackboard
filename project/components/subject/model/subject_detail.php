<?php
if (!defined("true-access"))
{
	die("cannot access");
}
include_once("common.php");
/*
* books database
*/

function subject_getDetail($id)
{
	
	list($dbc,$error) = connect_to_database();

	
	if ($dbc)
	{

		//$query = "SELECT subjects.Id, Code, Name, Building, Class, Professor, Semester FROM SUBJECTS ";
		$query = "SELECT subjects.Id, Code, Name, Building, Class, Professor, Semester FROM SUBJECTS WHERE subjects.Id=$id ";
		$subject=NULL;
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			$subject = mysqli_fetch_array($result);
			
		}
	return $subject;
   }
}

/*
function repeatedEnroll ($username){

	list($dbc,$error) = connect_to_database();
	$repeated=false;

	
	if ($dbc){
		$username_safe = mysqli_real_escape_string($dbc,$username);

		$query = "SELECT subjects.Id FROM ENROLLMENTS WHERE username=$username ";
		$result = mysqli_query($dbc,$query);
		
		if ($result)
		{
			//aha we found you!
			
			while($user = mysqli_fetch_array($result,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;
			}
				
		}
		else
		{
			//bad, wrong username or password
		}
	}
	return $repeated;


}
*/

?>