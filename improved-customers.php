<?php require 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>


<?php
//firstdata.php


$sql = 'SELECT * FROM test_Customers'; //only things you will change--$sql and the loop 
//add where statment to change "where customerID = 1" for instance

//-----------------------------------------config area ends here----------------------------------


echo '
<h1>improved-customers.php</h1>
       <p>Plaid deep v fashion axe, squid Schlitz Austin cray viral banjo kale chips. Austin ennui master cleanse crucifix. Direct trade lo-fi Austin, bitters Helvetica heirloom actually paleo High Life retro. Raw denim umami brunch whatever. Banjo readymade Austin single-origin coffee wayfarers ennui next level roof party YOLO, Shoreditch Etsy. Intelligentsia Helvetica Neutra, craft beer sartorial gastropub Cosby sweater semiotics fanny pack flannel flexitarian keytar raw denim scenester. Sartorial occupy YOLO, farm-to-table 90\'s Kickstarter Odd Future before they sold out Wes Anderson hoodie American Apparel chambray tattooed twee.</p>
';

//New MySQLi code:
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    while ($row = mysqli_fetch_assoc($result))
    {
       echo "<p>";
       echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
       echo "LastName: <b>" . $row['LastName'] . "</b><br />";
       echo "Email: <b>" . $row['Email'] . "</b><br />";
       echo "</p>";
    }
}else{//no records
    echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database


/* MySQL Classic code below:
//Database Retrieval Steps: As in many server side languages, using the mysql_ functions we connect and retrieve our data in distinct stages.  We can break these stages into the following steps:
	
	//Connect to MySQL, authenticate the MySQL users
		//Below is the classic way to connect -- these can be different, depending on the database.
		//ORIGINAL VARIABLE: $myConn = mysql_connect($myHostName,$myUserName,$myPassword);
		$myConn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		//mysql_connect is the function.  $myConn is a backstage pass to MySQL--it's a live connection to the database.  You can pull things at will.  Sometimes called $con, $cn, or $db.


	//Connect to the Database, verify authorization to this resource
		//Good idea to set up a user who cannot modify/delete data.
		//ORIGINAL FUNCTION: mysql_select_db($myDatabase,$myConn);
		mysql_select_db(DB_NAME,$myConn); 
	
	
	//Select data to be retrieved via SQL statement AND...
	//Retrieve data set (result)
		$result = mysql_query($sql,$myConn);
		//$result is an assiciative array of all of your data.
		//$myConn allows us access.
		//Data has been retrieved and now lives (is floating in memory) on the web server.
	
	
	
	//Loop through the data, and insert it into our page
		while($row=mysql_fetch_assoc($result))
			{ //pull data from array
				echo "FirstName: " . $row['FirstName'] . "<br />";
				echo "LastName: " . $row['LastName'] . "<br />";
				echo "Email: " . $row['Email'] . "<br />";
			} 
		//We need to match the $sql statement with the loop.
		//while() loop stops at the end--only goes through once.
	
	
	//Disconnect from MySQL, and release resources 
		//Sometimes you don't want to disconnect automatically because you might need to reconnect to the database several times in order to perform all of the actions.
		@mysql_free_result($result); # releases web server memory
		//@ symbol will attempt to quiet errors line-by-line. Says, "Hey, please release this and don't tell me if you already did." Clears up resources on the web server.
		@mysql_close($myConn); #explicitely closes the connection between you and the database.
		//raw errors will show up.  Don't leave your credentials avail. for other people to see.
		//MySQLi is probably what you'll be using more than "classic", which is what we're learning now.
*/


include 'includes/footer.php';

?>