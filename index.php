<?php 
error_reporting(0);
 include "database.php";
 include "func_database.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP-pagination</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
		body { background-color:#ddd; }
		.blog-row {margin-top:50px; }
		.margin_bottom30 { margin-bottom:30px; }
		.margin_left10 {margin-left:10px; }
		.blog-content {padding:10px; }
		.bg-white {background-color:#fff;}
	</style>
</head>
<body>
	<div class="container">
	<div class="row blog-row">
	    <h1 class="text-center margin_bottom30"><a href="#">Blog</a></h1>
			<!-- post -->
			<?php 
			$PostPerPage=4;
			$Page=$_GET['p'];
			$result=GetPostsPagination($Page-1,$PostPerPage);
			// $result=GetPosts();	
			//print_r($result->fetch_assoc());				
			while ($row = $result->fetch_assoc()) { 
			?>
				<div class="col-md-6 col-sm-6 col-xs-12 margin_bottom30"  >
				<a href="#"  class="heading_color">
					<!-- http://i50.tinypic.com/2nbf0ht.jpg -->
					<img class="img-responsive center-block" src="<?php print $row['featuredimg'] ?>" alt="<?php print $row['altimg'] ?>" style="background-color:#ffffff;box-shadow: 1px 1px 5px black">
					</a>
					<div class="blog-content bg-white" style="box-shadow: 1px 1px 5px black">
					<h3><?php print $row['title'] ?></h3>
					<p><?php print substr($row['content'], 0, 300) ?></p>
					<hr><?php print $row['ondate'] ?>
					<p><span>Share : 
					<a href="?s=facebook"><i class="fa fa-facebook margin_left10" aria-hidden="true"></i></a>
					<a href="?s=twitter"><i class="fa fa-twitter margin_left10" aria-hidden="true"></i></a>
					<a href="?s=plus"><i class="fa fa-google-plus margin_left10" aria-hidden="true"></i></a>
					 </span> 
					<span class="pull-right">By : <strong><?php print $row['publisher'] ?></strong></span> </p>
					</div>
				</div>
			<?php
			} 
			?>
			
			<!-- /post -->
			
			
		</div>
		<div class="row">
		<div class="col-md-12">
			 <center>
			 	<ul class="pagination" style="box-shadow: 1px 1px 5px black">
			<?php 
				$Pages=GetCountPagePagination();
				$Pages=$Pages->fetch_assoc();
				$Pages= $Pages['pages']/$PostPerPage;
				$x = 1;
				while($x <= $Pages+1) {
				    print "<li><a href='?p=$x '> $x </a></li>";
				    $x++;
				} 
			 ?>
			 </ul>
			 </center>
		</div>
	</div>
</div>



	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>