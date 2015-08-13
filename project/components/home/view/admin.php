<?php
defined("true-access") or die("No script kiddies please!");
include_once("common.php");



define("form_title","title");
define("form_subtitle","subtitle");


function view($data)
{
		
	startOfPage("homeeeeee");
	startContent();
	siteTitle("Blackboard");
	p("Welcome to Blackboard - Please Log in !");
	users_renderLoginForm();

	echo "<h3>If you want to change the title and subtitle do it now!</h3>";

	echo "<b><a href= 'editTitle.php' >Edit title</a></b>";
	


	endContent();
	endOfPage();

}















	






?>