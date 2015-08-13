<?php

if (!defined("true-access"))
{
	die("cannot access");
}

include_once("common.php");
/*
* Enrollments database
*/

function enrollment_addSubject($subject, $username)
{
	list($dbc, $error) = connect_to_database();

	$subject_safe = mysqli_real_escape_string($dbc, $subject); //protect ourselves
	$username_safe = mysqli_real_escape_string($dbc,$username); //protect ourselves

	
	$results = mysqli_query($dbc,"insert into enrollments (username, subject) values ('$username_safe','$subject_safe')");
	
	return $results;
}

function enrollments_getAll($username)
{
	list($dbc, $error) = connect_to_database();


	$username_safe = mysqli_real_escape_string($dbc,$username); //protect ourselves
	
	$results = mysqli_query($dbc,"select * from enrollments join subjects on enrollments.subject = subjects.id where username='$username_safe'");
	
	$allEnrollments = array();
	
	if ($results)
	{
		while ($enrollment = mysqli_fetch_array($results,MYSQLI_ASSOC))
		{
			$allEnrollments[] = $enrollment;
		}
	}
	
	return $allEnrollments;
}


?>