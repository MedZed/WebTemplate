<?php
   $msg=''; // Variable To Store Error Message

   if (isset($_POST['submit'])) {
   if (empty($_POST['username']) || empty($_POST['password'])) {
   $msg = "Username or Password Should not be empty";
   } else {
	// Including the php connection page script + calling the connect function.
	require_once ("connection.php");
	check_connection();

	// Adding data to table.
	$id ="";
	$username =$_POST['username'];
	$password =$_POST['password'];

	$insetion ="INSERT INTO login (username,password) VALUES ('$username','$password')";
	$start_req = mysqli_query($con,$insetion);
	if ($start_req) { header("location: data_selection.php"); 
					} else {
						echo "there is a problem.";
					}
	require_once ("disconnection.php");}
 }
?>

<!-- simple html form to add the values -->
<form action="" method="post">
<input id="name" name="username" placeholder="username" type="text">
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Add to table ">
<p><?php echo $msg; ?></p>
</form>