<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");

/*
* Main function
*/
function view($data)
{
		
	startOfPage("homeeeeee");
	startContent();
	siteTitle("Blackboard");
	p("Welcome to Blackboard - Please Log in !");
	users_renderLoginForm();

	echo "<p><a href= 'index.php?option=user&view=students_list' >List of students</a></p>";
	echo "<p><a href= 'index.php?option=subject&view=subjects_list''>List of subjects</a></p>";

	endContent();
	endOfPage();

}





?>