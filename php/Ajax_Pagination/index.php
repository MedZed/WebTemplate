<?php
	require_once "connect.php";
	connect();

	require_once "data.php";
	$data = new data(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook Pagination</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <style>
    

    body{
    	margin:0;
    	padding:0;
    	background-color: #efefef;
    	font-family: sans-serif;
    	font-size: 16px;
    	}
    .container{
    	min-height: 300px;
    	background: #fff;
    	width:750px;
    	padding:10px;
    }
    .get-data{
    	text-align: center;

    }
    .loadmore{

    }	
    </style>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script> 
// 			    $(document).ready(function(){
// $(".loadmore").click(function(){alert('gg');});
// 			  }); 
			$(function(){
				$("body").on('click','.loadmore',function(){
					var lastid = $(this).attr('data-id');
					var current = $(this);
					current.html("loading please wait ..");
					$.post("page.php",{lastId:lastid}, function(data){
						current.remove();
						$(".get-data").append(data);
					});
 
				});
			});
		</script>

</head>
 
<body>
	<div class="container">
		<div class="page-header" style="padding:0 0 10px 0;margin:0 0 10px 0;"><center><h3 style="margin:0;">Facebook Pagination System</h3></center></div>
		<div class="get-data well">
			<?php $data->getData(); ?>
			 
		</div>
	</div>

</body>
</html>