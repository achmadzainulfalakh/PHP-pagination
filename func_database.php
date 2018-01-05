<?php
function GetPosts()
{
	global $conn;
	$sql="select * from posts";
	$result = $conn->query($sql);
	return $result;
}

function GetCountPagePagination()
{
	global $conn;
	$sql="select count(*) as pages from posts";
	$result = $conn->query($sql);
	return $result;
}
function GetPostsPagination($Page,$PostPerPage)
{
	$Page=$Page*$PostPerPage;
	global $conn;
	$sql="select * from posts limit $Page,$PostPerPage";
	$result = $conn->query($sql);
	return $result;
}