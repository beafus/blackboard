<?php
if (!defined("true-access"))
{
	die("cannot access");
}

include_once("common.php");

/**
* Check if a user exists in the database, adds user to session if exists
*/
function users_checkExists($username, $password)
{
	list($dbc,$error) = connect_to_database();

	
	$success = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
		//$password_safe = mysqli_real_escape_string($dbc,sha1($password));
	
		$query = "SELECT * from users where username='$username_safe' AND password='$password_safe'";	
		$result = mysqli_query($dbc,$query);
		
		if ($result)
		{
			//aha we found you!
			
			while($user = mysqli_fetch_array($result,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;
			}
			
			
		}
		else
		{
			//bad, wrong username or password
		}
	}
	return $success;
}

function users_checkAdmin($username)
{
	list($dbc,$error) = connect_to_database();

	
	$admin = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		
		$query = "SELECT * from users where username='$username_safe' AND Type='professor'";	
		$result = mysqli_query($dbc,$query);
		
		if ($result)
		{
			//aha we found you!
			
			while($user = mysqli_fetch_array($result,MYSQLI_BOTH))
			{

				$admin=true;
				/*
				$_SESSION['user'] = $user;
				
					if ($user["Type"]=="professor"){
				$admin = true;
					}
			
					else{
				//not admin
					}

					*/
			}
			
			
		}
		else
		{
			//noooo
		}
}
	
return $admin;
}



?>