<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");

/*
* Main function
*/
function view($data)
{
		
	startOfPage("students list vieww");
	startContent();
	siteTitle("Blackboard");
	p("Welcome to Blackboard - Please Log in !");
	
	$students = $data["users"];
	if (!empty($students))
	{

		h2("List of students:");
		foreach ($students as $student)
		{
			students_render($student);

		}

		h2("List of professors:");
		foreach ($students as $student)
		{
			professors_render($student);
			
			
		}
	}

	endContent();
	endOfPage();

}

/*
* subjects layout helpers
*/
function students_render($student)
{
	
if ($student["Type"]==student){
	
	h3($student['FirstName']." ".$student['LastName']);
	
	p("Email: ".$student['Email']);

}

}



function professors_render($student)
{

if ($student["Type"]==professor){
	
	h3($student['FirstName']." ".$student['LastName']);
	
	p("Email: ".$student['Email']);
	

}

}









?>