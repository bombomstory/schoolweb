<?php
	if(empty($_GET["s"]))
	{
		$reading=get_reading($_GET["is"],"header")+1;
		$sql="update ".$CFG->prefix."header set reading=".$reading." where name='".$_GET["is"]."'";
	}else{
		$reading=get_reading($_GET["s"],"sidebar")+1;
		$sql="update ".$CFG->prefix."sidebar set reading=".$reading." where name='".$_GET["s"]."'";
	}
	$rs=mysqli_query($conn,$sql);
	$sql="select * from ".$CFG->prefix."contents as a,".$CFG->prefix."content_pos as b where a.id = b.contentid and b.page='".$_GET["is"]."'";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs))
	{
		if(!empty($_SESSION))
		{
			echo "<font size=2><div align=right><strong><a href='index.php?is=add&type=content'>&#10003;เพิ่ม</a> | <a href='index.php?is=delete&type=content&did=".$data["id"]."' OnClick='return checkConfirm(\"".htmlspecialchars($data["title"])."\");'>&#10008;ลบ</a> | <a href='index.php?is=edit&type=content&eid=".$data["id"]."'>&#10000;แก้ไข</a> | <a href='#'>&#9832;จัดการ</a></strong></div></font><br>";
		}
?>
		<div class="article">
          <h2><span><?=$data["title"];?></span> </h2>
          <p class="infopost">ประกาศวันที่ <span class="date"><?=$data["postdate"];?></span> โดย <a href="#"><?=$data["postby"];?></a> &nbsp;&nbsp;|&nbsp;&nbsp; สถานที่ <?=$data["place"];?><a href="#" class="com"><span><?=$data["reading"];?></span></a></p>
          <div class="clr"></div>
          <div class="post_content">
            <p><?=$data["header"];?></p>
            <p class="spec">
				<a href="like.php?id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;ถูกใจ (<?=$data["likes"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="?is=<?=$_GET["is"];?>&s=<?=$_GET["s"];?>&id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;อ่านรายละเอียด (<?=$data["reading"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="#" class="rm">&nbsp;&nbsp;แชร์ (<?=$data["share"];?> ครั้ง) &nbsp;&nbsp;</a>
			</p>
          </div>
          <div class="clr"></div>
        </div>
<?php
	}
?>
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>