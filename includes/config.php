<?php
//config.php - site-wide settings

include 'includes/credentials.php'; #database credentials

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

define('DEBUG',TRUE); #we want to see all errors


/*below commands test that this page's name will come up*/
//echo THIS_PAGE;
//die;

//$variable['page address'] = "what shows up on hover"; 
/*this navigation is global. You could use it anywhere on the page.  This is just the data.*/
//$nav1['url'] = 'label';
//key = value
$nav1['index.php'] = 'Home';
$nav1['improved-customers.php'] = 'Improved Customers';
$nav1['form1.php'] = 'Form 1';
$nav1['form2.php'] = 'Form 2';



/* tests the array

echo '<pre>';
	var_dump($nav1);
echo '</pre>';
die;
*/


switch(THIS_PAGE)
{
	case 'index.php': 
		$title = "Improved Customers";
		$banner = "Improved Customers";
		$image = "header";
		break;
		
	case 'improved-customers.php': 
		$title = "Form 1";
		$banner = "Form 1";
		$image = "form1";
		break;
		
	case 'form1.php': 
		$title = "Form 1";
		$banner = "Form 1";
		$image = "form1";
		break;
	
	case 'form2.php': 
		$title = "Form 2";
		$banner = "Form 2";
		$image = "form2";
		break;
	
	default:
		$title = "Title";
		$banner = "Banner";
		$image = "header";
	
}



function makeLinks($nav) //let's define our function
{
	$myReturn = ""; //
	
	foreach($nav as $url => $label ) //foreach loop, split an associative array with =>
	{
		
		if(THIS_PAGE == $url) //if this page matches the URL variable we set up...
		{//if: same page, show current class. 
			$myReturn .= '<li class="current"><a href="' . $url . '">' . $label . '</a></li>';
		}else{//if not: not special (no extra class)
			$myReturn .= '<li><a href="' . $url . '">' . $label . '</a></li>';
			}
		
		
		/* $myReturn .= '<li><a href="index.html">Home</a></li>'; 			(BEFORE)
		$myReturn .= '<li><a href="' . $url . '">' . $label . '</a></li>'; 		.= is concatenate and append. */
		
	} 
	
    return $myReturn;


}



/* (Always add comments on how to use a function.)

This function builds and sends a safe email, using Reply-To properly!

$today = date("Y-m-d H:i:s");
$to = 'kbajem01@seattlecentral.edu';
$replyTo = 'bajemak@mail.gvsu.edu';
$subject = 'Test Email, includes ReplyTo: ' . $today;
$message = 'Test Message Here.  Below should be a carriage return or two: ' . PHP_EOL . PHP_EOL .
'Here is some more text.  Hopefully BELOW the carriage return!
';

safeEmail($to, $subject, $message, $replyTo);

*/

function safeEmail($to, $subject, $message, $replyTo='') //if you don't give it the fourth perameter, it will give it an empty set. Default value is in-line.  This goes into your config file, which IS your application.
{#builds and sends a safe email, using Reply-To properly!
    $fromDomain = $_SERVER["SERVER_NAME"]; //what domain am I on, PHP?
    $fromAddress = "noreply@" . $fromDomain; //form always submits from domain where form resides
    if($replyTo==''){$replyTo='';}
    $headers = 'From: ' . $fromAddress . PHP_EOL .
        'Reply-To: ' . $replyTo . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();
    return mail($to, $subject, $message, $headers);
}




function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#removes underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL; //implode returns a comma-separated string of the array values.
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
} 




#statement was cut and pasted above (debug true)
function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}
