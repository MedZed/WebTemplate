<?php
	// Including the php connection page script + calling the connect function.
	require_once ("connection.php");
	check_connection();

	// Requestion data from table.
	$request = "SELECT * FROM login";
	$result = mysqli_query($con,$request);

	if (mysqli_num_rows($result) > 0) {
	    // Output data of each row.
	    while($row = mysqli_fetch_assoc($result)) {
	        echo 'Result : ( id is '.$row['id'].' and username is '.$row['username'].' )<br><hr>';
	    }
	} else {
	    echo "0 results <br><hr>";
		}
		
	require_once ("disconnection.php");
?>