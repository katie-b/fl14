<?php require 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
           
<h1>Contact Us</h1>
<p>Why? Because we care!</p>

<?php
if(isset($_POST['First_Name']))
{//if there's data, show it
	//echo $_POST['FirstName'];	
	
	$message = process_post();
	
	safeEmail('kbajem01@seattlecentral.edu','subject',$message);
	echo 'Thank you for your email!';
	
}else{//show the form
	echo '
	<form action="form1.php" method="post">
	<label>First Name:</label> <input type="text" name="First_Name" required="required" />
	
	<label>Email:</label> <input placeholder="Enter a valid email" type="email" name="Email" required="required" />
	
	<label>Comments:</label> <textarea name="Comments"></textarea>
	<input type="submit" value="Submit" />
	
	</form>
	';
}

?>

<?php include 'includes/footer.php' ;?>