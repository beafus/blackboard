<?php
defined("true-access") or die("No script kiddies please!");

include_once("model/common.php");
include_once("model/students_list.php");
include_once("model/users.php");
include_once("view/common.php");

/**
* Store component controller
*/
function get_view_enabled($view)
{
	if ($view == "students_list"){
		return "execute_students_list";
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


function execute_students_list()
{
	include_once("view/students_list.php");
	$data = array();
	$data["users"] = students_getAll();


	view($data);
}
















?>