<?php

function connect(){


	$connect = @mysql_connect("localhost","root","");
	$dbHandel = mysql_select_db("mtest", $connect);

	if($dbHandel == false){
		die(mysql_error());
	} 
		  // else {echo "Connect has been created";}
	

}





?>