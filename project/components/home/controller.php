<?php
defined("true-access") or die("No script kiddies please!");

include_once("model/common.php");
include_once("model/users.php");
include_once("view/common.php");

/**
* Store component controller
*/
function get_view_enabled($view)
{
	
	if ($view == "login"){
		return "execute_login";
	}
	else if ($view == "logout"){
		return "execute_logout";
	}
	else if ($view == "home"){
		return "execute_homepage";
	}
	else if ($view == "admin"){
		return "execute_admin";
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



function execute_homepage(){

	

	include_once("view/home.php");
	$data = array();
	

	view($data);


}

function execute_admin(){

	

	include_once("view/admin.php");
	$data = array();
	

	view($data);


}


function execute_login()
{


	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$success = users_checkExists($username,$password);

	

	$admin = users_checkAdmin($username);

	if($admin){

		
		
		execute_admin();
	}
	else{
		
		execute_homepage();
	}

	
}

function execute_logout()
{
	/*
	* Logout and clear the session submission page
	*/
	session_unset ();
	execute_homepage(); 
	
}











?>