<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");
/*
* Purchases layout
*/

/*
* Main function
*/
function view($data)
{
	startOfPage("esto es el view enrollment");
	siteTitle("Blackboard");
	p("Welcome to Blackboard - Select your subjects!");
	$history = $data["enrollments"];
	h1("Your Subjects");
	


	foreach($history as $enrollment)
	{
		
		enrollments_render($enrollment);
	}
	endOfPage();
}

function enrollments_render($enrollment)
{
	h3($enrollment['Name']);
	
	p("imparted by ".$enrollment['Professor']);
}

?>