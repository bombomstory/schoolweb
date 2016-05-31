<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();
$CFG->prefix="cms_";
$CFG->host="localhost";							// Your database host
$CFG->user="root";								// Your database username
$CFG->password="";								// Your database password
$CFG->database="webschool";						// Your database name
$CFG->wwwroot="http://localhost/webschool/";	// Your website path

$conn = mysqli_connect($CFG->host,$CFG->user,$CFG->password,$CFG->database);
mysqli_set_charset($conn, "utf8");

function get_reading($name,$table)
{
	global $CFG,$conn;
	$sql="select reading from ".$CFG->prefix."$table where name='".$name."'";
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	return $data["reading"];
}
function get_like($id)
{
	global $CFG,$conn;
	$sql="select likes from ".$CFG->prefix."contents where id=".$id;
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	return $data["likes"];
}
function get_creading($id)
{
	global $CFG,$conn;
	$sql="select reading from ".$CFG->prefix."contents where id=".$id;
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	return $data["reading"];
}
function get_share($id)
{
	global $CFG,$conn;
	$sql="select share from ".$CFG->prefix."contents where id='".$id."'";
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	return $data["share"];
}
?>