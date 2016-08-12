<?php

	class data{
		public function getData(){
 
			$query = mysql_query("SELECT * FROM post ORDER BY id DESC LIMIT 5");
			if($query == false){
				die(mysql_error());
			} else {
				echo "<p>";
				while($data = mysql_fetch_assoc($query)){
					$getmore = $data['image'];
					$lastid = $data['id'];
					echo "<p class=' thumbnail img-responsive' ><img class=' img-responsive' src='image/$getmore'></p><br>";
				}
				echo "<p class='loadmore btn btn-primary' data-id='$lastid'>Load More</p>";
				echo "</p>";
			}
		}}

?>