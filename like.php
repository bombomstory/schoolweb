<?php
	require_once("webcfg.php");
	$like=get_like($_GET["id"])+1;
	$sql="update ".$CFG->prefix."contents set likes=".$like." where id=".$_GET["id"];
	$rs=mysqli_query($conn,$sql);
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=".$_SERVER["HTTP_REFERER"]."'>";
?>