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
	<label>First Name:</label> <input type="text" name="First_Name" required="required" class="margin-bottom"/>
	
	<label>Email:</label> <input placeholder="Enter a valid email" type="email" name="Email" required="required" class="margin-bottom" />
	
	<label>Comments:</label> <textarea name="Comments"></textarea>
	<input type="submit" value="Submit" class="margin-bottom" />
	
	<label>I love...</label>
    <p>
        <input type="radio" name="love" value="truth" />Truth
        <input type="radio" name="love" value="lies" class="margin-bottom" />Lies
    </p>
	
	<label class="padding-top">FAVORITE GAMES</label>
    <p><input class="block" type="checkbox" name="games[]" value="catan" />The Settlers of Catan</p>
    <p><input class="block" type="checkbox" name="games[]" value="carcassonne" />Carcassonne</p>
    <p><input class="block" type="checkbox" name="games[]" value="canadiansalad" />Canadian Salad</p>
    <p><input class="block" type="checkbox" name="games[]" value="tickettoride" />Ticket to Ride</p>
    <p><input class="block" type="checkbox" name="games[]" value="speed" class="margin-bottom" />Speed</p>
	
	</form>
	';
}

?>

<?php include 'includes/footer.php' ;?>