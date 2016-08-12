<?php

require_once "connect.php";
connect();
 $id = $_POST['lastId'];

  $query = mysql_query("SELECT * FROM post WHERE id < $id ORDER BY id DESC  LIMIT 5");

if (mysql_num_rows($query)){
				while($data = mysql_fetch_assoc($query)){
					$getmore = $data['image'];
					$lastid = $data['id'];
					echo "<p class=' thumbnail img-responsive' ><img class=' img-responsive' src='image/$getmore'></p><br>";
				}
				echo "<p class='loadmore btn btn-primary' data-id='$lastid'>Load More</p>";
				echo "</p>";

} else {
	echo "<h3> no more data</h3>";
}











// 			if($query == false){
// 				die(mysql_error());
// 			} else {
// 				echo "<p>";

		 
// 		}



?>