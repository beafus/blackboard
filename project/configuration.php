<?php
if (!defined("true-access"))
{
	die("cannot access");
}

/*
* common database code
*/




		$installationPath= "./installations/installation/";



		$hostPath=$installationPath."host.txt";
    	$userPath=$installationPath."user.txt";
    	$passwordPath=$installationPath."password.txt";
    	$databasePath=$installationPath."database.txt";
			

		$stringHost=file_get_contents($hostPath);
		

		$stringUser=file_get_contents($userPath);
		$stringPassword=file_get_contents($passwordPath);
		$stringDatabase=file_get_contents($databasePath);
	
		





		define("SALT","ter");
		define("DB_HOST",$stringHost);
		define("DB_USER",$stringUser);
		define("DB_PASSWORD",$stringPassword);

		define("DB_DATABASE",$stringDatabase);






?>