<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");

/*
* Main function
*/
function view($data)
{
		
	startOfPage();
	startContent();
	siteTitle("Blackboard");
	p("Welcome to Blackboard");
	
	$subjects = $data["subjects"];
	if (!empty($subjects))
	{
		foreach ($subjects as $subject)
		{
			subjects_render($subject);
		}
	}

	endContent();
	endOfPage();

}

/*
* subjects layout helpers
*/
function subjects_render($subject)
{
	echo'<h3><a href= "index.php?option=subject&view=subject_detail&id='.$subject['Id'].'"> '.$subject['Code'].' '.$subject['Name'].'</a></h3>';
	p("Building: ".$subject['Building']." ".$subject["Class"]);
	p("Imparted by: ".$subject['Professor']);
	p("Semester: ".$subject['Semester']);

/*
	if (users_loggedIn()) {
		subjects_renderEnrollmentForm($subject);
	}
	*/
	
}

/*
function subjects_renderEnrollmentForm($subject) {

	echo '<form id="enroll'.$subject['Id'].'" action="index.php?option=subject&view=enrollment" method="POST">       '.PHP_EOL;
	echo '	<input name="username" type="hidden" value="'.$_SESSION['user']['username'].'"/>'.PHP_EOL;
	echo '	<input name="subject" type="hidden" value="'.$subject['Id'].'"/>'.PHP_EOL;
	echo '	<input type="submit" value="Enroll"/>                     '.PHP_EOL;
	echo '</form> ';    
}
*/




?>