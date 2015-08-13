<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");

/*
* Main function
*/
function view($data)
{
		
	startOfPage("subjectsss en view subdetail");
	startContent();
	siteTitle("Blackboard");
	p("Welcome to Blackboard - Please Log in and select your subjects!");
	
	$subject = $data["subjects"];
	if (!empty($subject))
	{
		
			subjects_render($subject);
		
	}

	endContent();
	endOfPage();

}

/*
* subjects layout helpers
*/
function subjects_render($subject)
{
	h3($subject['Code']." -".$subject['Name']);
	
	p("Building: ".$subject['Building']." ".$subject["Class"]);
	p("Imparted by: ".$subject['Professor']);
	p("Semester: ".$subject['Semester']);

	if (users_loggedIn()) {
		subjects_renderEnrollmentForm($subject);
	}

	
}


	

function subjects_renderEnrollmentForm($subject) {

	echo '<form id="enroll'.$subject['Id'].'" action="index.php?option=subject&view=enrollment" method="POST">       '.PHP_EOL;
	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
	echo '	<input name="subject" type="hidden" value="'.$subject['Id'].'"/>'.PHP_EOL;
	echo '	<input type="submit" value="Enroll"/>                     '.PHP_EOL;
	echo '</form> ';    
}


?>