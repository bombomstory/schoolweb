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
?>
		<div class="article">
          <h2><span><?=$data["title"];?></span> </h2>
          <p class="infopost">ประกาศวันที่ <span class="date"><?=$data["postdate"];?></span> โดย <a href="#"><?=$data["postby"];?></a> &nbsp;&nbsp;|&nbsp;&nbsp; สถานที่ <?=$data["place"];?><a href="#" class="com"><span><?=$data["reading"];?></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="../images/<?=$data["picture"];?>" width="650" height="196" alt="" class="fl" /></div>
          <div class="post_content">
            <p><?=$data["header"];?></p>
            <p class="spec">
				<a href="#" class="rm">&nbsp;&nbsp;ถูกใจ (<?=$data["likes"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="#" class="rm">&nbsp;&nbsp;อ่านรายละเอียด (<?=$data["reading"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="#" class="rm">&nbsp;&nbsp;แชร์ (<?=$data["share"];?> ครั้ง) &nbsp;&nbsp;</a>
			</p>
          </div>
          <div class="clr"></div>
        </div>
<?php
	}
?>
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>