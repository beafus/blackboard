<?php
define("true-access", true);




include_once("components/user/model/common.php");
include_once("layoutInstall/common.php");




startOfPage("Blackboard site");
startContent();
siteTitle("Blackboard");
h2("Welcome to Blackboard - Please Install your database!");

define("form_host","host");
define("form_user","user");
define("form_password","password");
define("form_database","database");



function display_installation_form()
{

  echo '<form enctype="multipart/form-data" method="POST" action="">'.PHP_EOL;

  echo '<table>';
  echo '<tr><td><b>Host Name:<b/></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40"name="'.form_host.'" placeholder="enter host"></textarea></td></tr>'.PHP_EOL;

  echo '<tr><td><b>User Name:<b/></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40" name="'.form_user.'" placeholder="enter user"></textarea></td></tr>'.PHP_EOL;

  echo '<tr><td><b>Password:<b/></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40" name="'.form_password.'" placeholder="enter password"></textarea></td></tr>'.PHP_EOL;

  echo '<tr><td><b>Database Name:<b/></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40" name="'.form_database.'" placeholder="enter database name"></textarea></td></tr>'.PHP_EOL;
  echo '</table>';

  
  echo '<input type="submit"  name="submit" value="Submit"/> '.PHP_EOL;
  echo '</form>'.PHP_EOL;

  

  if (!empty($_POST["submit"])&& (empty($_POST[form_host])|| empty($_POST[form_user])||empty($_POST[form_password])||empty($_POST[form_database]) ))

    echo '<p style="color: red;">Please enter all the required data</p>'.PHP_EOL;  
  

}





function  confirm_update()
{

  global $installation;
  //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


  if (!empty($inputHost) && !empty($inputUser) && !empty($inputPassword) && !empty($inputDataBase)   ) {
  


    $installationPath= "./installations/installation/";
    $hostPath=$installationPath."host.txt";
    $userPath=$installationPath."user.txt";
    $passwordPath=$installationPath."password.txt";
    $databasePath=$installationPath."database.txt";

    mkdir($installationPath);

    

    file_put_contents($hostPath, htmlspecialchars($inputHost),FILE_APPEND | LOCK_EX);

    file_put_contents($userPath, htmlspecialchars($inputUser), FILE_APPEND | LOCK_EX);

    file_put_contents($passwordPath, htmlspecialchars($inputPassword),FILE_APPEND | LOCK_EX);

    file_put_contents($databasePath, htmlspecialchars($inputDataBase), FILE_APPEND | LOCK_EX);


   echo '<h3><a href="index.php">Go to your page!</a></h3>';
   



  }
  else{
  	echo "introduce data";
  }
    
    

    
  }


  



display_installation_form();

confirm_update();

  include_once("configuration.php");


//Creation of database



function createDatabase(){

   //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];

  if (!empty($inputHost) && !empty($inputUser) && !empty($inputPassword) && !empty($inputDataBase)   ) {


	   $database = mysqli_connect($inputHost,$inputUser,$inputPassword);
    $query=mysqli_query($database, "CREATE DATABASE IF NOT EXISTS $inputDataBase");

  }

}

createDatabase();







function createUsersTable(){

	 //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


	$datab=mysqli_connect($inputHost,$inputUser,$inputPassword,$inputDataBase);
//Creation of students table
mysqli_query($datab,"CREATE TABLE IF NOT EXISTS  users
	(
  Id int ,
  username varchar(100) ,
  password varchar(300) ,
  FirstName varchar(100) ,
  LastName varchar(100),
  Email varchar(100),
  Type varchar(30)
		)");

}





function  checkIfUserExists($id,$Username, $Password, $FirstName,$LastName,$Email,$Type){

	 //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


	$datab=mysqli_connect($inputHost,$inputUser,$inputPassword,$inputDataBase);


	$result = mysqli_query ($datab,"SELECT * FROM users WHERE Id = $id");
     $row = mysqli_fetch_row($result);
     $total_records = $row[0];
     if($total_records == 0)

     {
       mysqli_query($datab,"INSERT INTO users VALUES        
       ('$id','$Username', '$Password','$FirstName','$LastName','$Email','$Type')");  
     
      } else
      { 
            echo "";
      }
}






	function createSubjectsTable(){


			 //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


	$datab=mysqli_connect($inputHost,$inputUser,$inputPassword,$inputDataBase);


		//Creation of subjects table
mysqli_query($datab,"CREATE TABLE IF NOT EXISTS  subjects
	(
  Id int,
  Code varchar(30) ,
  Name varchar(100) ,
  Building varchar(100) ,
  Class varchar(100) ,
  Professor varchar(100) ,
  Semester varchar(10) 
		)");

}






  function  checkIfSubjectExists($id,$Code,$Name,$Building,$Class,$Professor,$Semester){

	

		 //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


	$datab=mysqli_connect($inputHost,$inputUser,$inputPassword,$inputDataBase);



	$result = mysqli_query ($datab,"SELECT * FROM subjects WHERE Id = $id");
     $row = mysqli_fetch_row($result);
     $total_records = $row[0];
     if($total_records == 0)

     {
       mysqli_query($datab,"INSERT INTO subjects VALUES        
       ('$id','$Code','$Name','$Building','$Class','$Professor','$Semester')");  
     
      } else
      { 
            echo "";
      }
}







function createEnrollmentTable(){

		 //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


	$datab=mysqli_connect($inputHost,$inputUser,$inputPassword,$inputDataBase);

		
		//Creation of subjects table
mysqli_query($datab,"CREATE TABLE IF NOT EXISTS  enrollments
	(

  id int NOT NULL AUTO_INCREMENT,
  subject int,
  username varchar(30),
  PRIMARY KEY (`id`)
   )");





}


function createTables(){


  	  //blog title name
  $inputHost = $_POST[form_host];
  //blog is the name of the text field
  $inputUser = $_POST[form_user];
   //blog title name
  $inputPassword = $_POST[form_password];
  //blog is the name of the text field
  $inputDataBase = $_POST[form_database];


  if (!empty($inputHost) && !empty($inputUser) && !empty($inputPassword) && !empty($inputDataBase)   ) {



  	createUsersTable();
	checkIfUserExists('1','bfusterg','904deeaf9fdc44dd75e17954d10f21889ce8669a','Beatriz','Fuster','bfusterg@hawk.iit.edu', 'student');
	checkIfUserExists('2','jrtundidor','1d1f7b626bbd3efa49c7b5ac68a88fdd3d60a7a0','Jaime','Ruiz','jrtundidor@gmail.com','student');
	checkIfUserExists('3', 'andreagm','90fd7547a62150eed1b1354f7814366775784440','Andrea', 'Gomez', 'andreagm@gmail.com','student');
	checkIfUserExists('4', 'jlamber4','0efa0f43d9f28d92c0ab6b8611c039f29270dfc7','Jason', 'Lambert', 'jlamber4@hawk.iit.edu','professor');
	checkIfUserExists('5', 'phuang9','375eeeeccd8f6f249f182b5284710e6338b669a4','Peisong', 'Huang', 'phuang9@iit.edu','professor');
	checkIfUserExists('6', 'carlson','9753456e0298e686b5eb1d5ef1019a7f31fc44dd','Carl', 'Carlson', 'carlson@iit.edu','professor');
	checkIfUserExists('7', 'mschray','9b612414e1804c937d5305eecdfc3a942604db9d','Martin', 'Schray', 'mschray@iit.edu','professor');




 	createSubjectsTable();
	checkIfSubjectExists('1','ITMD-555-02', 'Intelligent Device Application', 'E1', '241', 'Peisong Huang', 'Fall');
	checkIfSubjectExists('2','ITMD-562-01', 'Web Site Development', 'E1', '104', 'Jason Lambert', 'Fall');
	checkIfSubjectExists('3','ITMD-555-01', 'Intelligent Device Application', 'Tech Business Center', 'Idea Shop', 'Martin Schray', 'Fall');
	checkIfSubjectExists('4','ITMM-581', 'IT Entrepreneurship', 'E1', '121', 'Carl Carlson', 'Fall');



  	createEnrollmentTable();

	}

}

createTables();










  

















?>