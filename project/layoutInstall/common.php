<?php
defined("true-access") or die("No script kiddies please!");

/*
* common layout
*/

/*
function startOfPage()
{
	echo '<!doctype html> '.PHP_EOL;
	echo '<html>          '.PHP_EOL;
	echo '</head>         '.PHP_EOL;
	echo '<body>          '.PHP_EOL;
}
*/


  



   

     



function startOfPage() {

    $informationPath= "./titles/title/";
    $titlePath=$informationPath."title.txt";   
    $subtitlePath=$informationPath."subtitle.txt"; 
    $stringSubtitle=file_get_contents($subtitlePath);
     $stringTitle=file_get_contents($titlePath);

	echo "<!doctype html>  "															.PHP_EOL;
	echo '<html xmlns="htpp://www.3w.org/1999/xhtml" xml:lang="en" lang="en">          '.PHP_EOL;
	echo "<head>     
	      "															.PHP_EOL;
	echo '<meta http-equiv="Content-Type" content="text/html charset=utf-8"/>'			.PHP_EOL;

	
	//if (isset($title))
	//{
		echo '<title>'.$stringTitle.'</title>'. PHP_EOL;
	//}

		?>
	 <!-- Le styles -->
   	<link href="content/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

    


      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing messages */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
		    background: url(content/img/back.jpg);
		    color: white;
      }

      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }

      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


<?php
    echo'</style>';

    echo'<link href="content/css/bootstrap-responsive.css" rel="stylesheet">';

    //<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    //<!--[if lt IE 9]>
     echo' <script src="js/html5shiv.js"></script>';
   // <![endif]-->

    //<!-- Fav and touch icons -->
    echo'<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">';
    echo'<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">';
   	echo' <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">';
    echo'<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">';
    echo'<link rel="shortcut icon" href="ico/favicon.png">';
	echo "</head>          ".PHP_EOL;


	echo "<body>           ".PHP_EOL;


   echo' <div class="container-narrow">';

    echo'  <div class="masthead">';
    echo'    <ul class="nav nav-pills pull-right">';
    echo'      <li class="active"><a href="installation.php">Installation</a></li>';
 
     
        
         

     echo'   </ul>';
     echo'   <h3 class="muted">'.$stringTitle.'</h3>';
     echo' </div>';

     echo' <hr>';

      echo'<div class="jumbotron">';
      echo'  <h1>Welcome to</h1>';
      echo'  <h1> '.$stringTitle.'</h1>';
      echo'  <p class="lead">'.$stringSubtitle.'</p>';
      echo'  <a class="btn btn-large btn-success" href="installation.php">Install your database!</a>';
      echo'</div>';



}

function endOfPage()
{
	echo '</body> '.PHP_EOL;
	echo '</html> '.PHP_EOL;
}

function siteTitle()
{
   $informationPath= "./titles/title/";
   $titlePath=$informationPath."title.txt";   
   $stringTitle=file_get_contents($titlePath);
	//echo "<h1><a style='color:red' href='index.php'>".$content."<a></h1>".PHP_EOL;
	
  echo'  <h1> '.$stringTitle.'</h1>'.PHP_EOL;
}

function startContent()
{
	echo '<article>'.PHP_EOL;
}

function endContent()
{
	echo '</article>'.PHP_EOL;
}

function startAside()
{
	echo '<aside>'.PHP_EOL;
}

function endAside()
{
	echo '</aside>'.PHP_EOL;
}

function h1($content)
{
	echo "<h1>".$content."</h1>".PHP_EOL;
}

function h3($content)
{
	echo "<h3>".$content."</h3>".PHP_EOL;
}

function h2($content)
{
	echo "<h2>".$content."</h2>".PHP_EOL;
}

function p($content)
{
	echo "<p>".$content."</p>".PHP_EOL;
}

function users_loggedIn()
{
	return (isset($_SESSION['user']));
}

function users_username()
{
	
}

function users_renderLoginForm()
{
	if (!users_loggedIn()) {
		echo '<form action="index.php?option=home&view=login" method="post">                          '.PHP_EOL;
		echo '	<input type="text" placeholder="username" name="username"/>'.PHP_EOL;
		echo '	<input type="password" placeholder="password" name="password"/>'.PHP_EOL;
		echo '	<input type="submit" value="Login"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
	else
	{
		p("Welcome user!");
		echo '<form action="index.php?option=home&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
	}
}


?>