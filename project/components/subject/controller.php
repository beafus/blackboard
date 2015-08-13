<?php
defined("true-access") or die("No script kiddies please!");

include_once("model/common.php");
include_once("model/subjects_list.php");
include_once("model/enrollments.php");
include_once("model/users.php");
include_once("model/subject_detail.php");
include_once("view/common.php");

/**
* Store component controller
*/
function get_view_enabled($view)
{
	if ($view == "subjects_list"){
		return "execute_subjects_list";
	}

	
	else if ($view == "enrollment"){
		return "execute_enrollment";
	}
	else if ($view == "subject_detail"){
		return "execute_subject_detail";
	}
	else
		return false;
}

function controller_route($view)
{
	if ($method = get_view_enabled($view))
	{
		$method(); //dynamic method invocation
	}
	else
	{
		die ("404 view not found"); //this could be a view too!
	}
	
}


function execute_subjects_list()
{
	include_once("view/subjects_list.php");
	$data = array();
	$data["subjects"] = subjects_getAll();

	view($data);
}


function execute_subject_detail()
{
	include_once("view/subject_detail.php");
	$data = array();
	
    $id=$_GET['id'];
	//$data["subjects"] = subject_getDetail($_GET['id']);
	$data["subjects"] = subject_getDetail($id);
	
	view($data);
}








function execute_enrollment()
{
	include_once("view/enrollment.php");
	
	
	$subject = $_POST['subject'];
	$username = $_POST['username'];

	enrollment_addSubject($subject,$username);
	$data = array();
	$data["enrollments"] = enrollments_getAll($username);
	
	view($data);
	
}




?>