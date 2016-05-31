<?php
	$reading=get_creading($_GET["id"])+1;
	$sql="update ".$CFG->prefix."contents set reading=".$reading." where id=".$_GET["id"];
	$rs=mysqli_query($conn,$sql);

	$sql="select * from ".$CFG->prefix."contents where id=".$_GET["id"];
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
?>
		<div class="article">
          <h2><span><?=$data["title"];?></span> </h2>
          <p class="infopost">ประกาศวันที่ <span class="date"><?=$data["postdate"];?></span> โดย <a href="#"><?=$data["postby"];?></a> &nbsp;&nbsp;|&nbsp;&nbsp; สถานที่ <?=$data["place"];?><a href="#" class="com"><span><?=$data["reading"];?></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="<?=$CFG->wwwroot;?>images/<?=$data["picture"];?>" width="650" height="196" alt="" class="fl" /></div>
          <div class="post_content">
            <p><?=$data["header"];?></p>
            <p><?=$data["detail"];?></p>
            <p class="spec">
				<a href="like.php?id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;ถูกใจ (<?=$data["likes"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="?is=<?=$_GET["is"];?>&s=<?=$_GET["s"];?>&id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;อ่านรายละเอียด (<?=$data["reading"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="#" class="rm">&nbsp;&nbsp;แชร์ (<?=$data["share"];?> ครั้ง) &nbsp;&nbsp;</a>
			</p>
          </div>
          <div class="clr"></div>
        </div>