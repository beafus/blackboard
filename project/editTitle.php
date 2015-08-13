

<?php
//defined("true-access") or die("No script kiddies please!");

define("true-access", true);
include_once("layoutEdit/common.php");


startOfPage();
startContent();
siteTitle("Blackboard");
//h2("Welcome to Blackboard - Please Install your database!");


function edit_title(){
	

 echo '<form enctype="multipart/form-data" method="POST" action="">'.PHP_EOL;

  //Text field to write your new title
  echo '<table>';
  echo '<tr><td><b>Page title:<b/></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40" name="'.form_title.'" placeholder="rename title"></textarea></td></tr>'.PHP_EOL;
  echo '<tr><td><textarea type="textfield" rows="1" cols="40" name="'.form_subtitle.'" placeholder="rename subtitle"></textarea></td></tr>'.PHP_EOL;
  echo '</table>';
    //Button to submit your entrie
  echo '<input type="submit"  name="submit" value="Rename"/> '.PHP_EOL;
  echo '</form>'.PHP_EOL;

   if (!empty($_POST["submit"])&& (empty($_POST[form_title])|| empty($_POST[form_subtitle]) ))

    //display an error message in case the blogger didn´t write a title or the text.
    //as the image is optinal if an image is not uploaded there wont be an error message.
    echo '<p style="color: red;">Please enter a title and subtitle</p>'.PHP_EOL;  
  
	//p("Imparted by: ".$subject['Professor']." semester: ".$subject["Semester"]);



}

function confirm_title(){

	  //blog title name
  $inputTitle = $_POST[form_title];
  $inputSubTitle = $_POST[form_subtitle];
 

  //$replace=str_replace("\r","<br>",$inputData);

  //if (!empty($_POST[form_blog_input_name]) && !empty($_POST[form_blog_title_name])  ) {

  if (!empty($inputTitle) && !empty($inputSubTitle) ) {
  

    //creation of a folder for each blog. In that folder the title, text and optional image will be stored.
    //$installationPath= "./installations/installation".$totalPosts."/";

    $informationPath= "./titles/title/";
    $titlePath=$informationPath."title.txt";
    $subtitlePath=$informationPath."subtitle.txt";
   

    mkdir($informationPath);

    file_put_contents($titlePath, htmlspecialchars($inputTitle),  LOCK_EX);
    file_put_contents($subtitlePath, htmlspecialchars($inputSubTitle), LOCK_EX);


    //we want the image to be in the correct format and size. 
echo '<h3><a href="index.php">Go to your page!</a></h3>';

  }
  else{
  	echo "introduce data";
  }


}

edit_title();
confirm_title();



?>