<?php
if(!empty($_POST)){
	if(strcmp($_POST["submit"],"&#10004; บันทึก")){		
		$sql="insert into ".$CFG->prefix."contents set title='".$_POST["title"]."',header='".$_POST["header"]."',detail='".$_POST["detail"]."' where id=".$_POST["eid"];
		$rs=mysqli_query($conn,$sql);
?>		
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>เพิ่มข้อมูลเสร็จเรียบร้อยแล้ว!</strong> <a href="index.php">คลิกที่นี่ เพื่อดำเนินการต่อ...</a>
</div>
<?php		
	}
}else{
	/*
	$sql="select * from ".$CFG->prefix."contents where id=".$_GET["eid"];
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	=== Value of Post ===
	INSERT INTO `cms_contents`
	(`id`, `title`, `picture`, `header`, `detail`, `postdate`, `postby`, `place`, `likes`, `reading`, `share`, `status`) 
	VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12])
	
	*/
?>
		<div class="article">
		<form action="" method="post">
		เรื่อง: <input type="text" name="title" size="80"><br />
          <p class="infopost">ประกาศวันที่ <span class="date"><?=$data["postdate"];?></span> โดย <a href="#"><?=$data["postby"];?></a> &nbsp;&nbsp;|&nbsp;&nbsp; สถานที่ <?=$data["place"];?><a href="#" class="com"><span><?=$data["reading"];?></span></a></p>
          <div class="clr"></div>
          <div class="post_content">
			<input type="hidden" name="eid" value="<?=$_GET["eid"];?>">
            <p>รายละเอียด: <textarea name="header" id="textbox" style="width: 100%; height: 400px;"><?=$data["header"];?></textarea></p>
            <p>รายละเอียดเพิ่มเติม: <textarea name="detail" id="textbox" style="width: 100%; height: 400px;"><?=$data["detail"];?></textarea></p>
			<p align="center"><input type="submit" name="submit" value="&#10004; บันทึก"> | <input type="submit" name="submit" value="&#10006; ยกเลิก"></p>
            <p class="spec">
				<a href="like.php?id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;ถูกใจ (<?=$data["likes"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="?is=<?=$_GET["is"];?>&s=<?=$_GET["s"];?>&id=<?=$data["id"];?>" class="rm">&nbsp;&nbsp;อ่านรายละเอียด (<?=$data["reading"];?> ครั้ง)&nbsp;&nbsp;</a><a href="#" class="rm">|</a>
				<a href="#" class="rm">&nbsp;&nbsp;แชร์ (<?=$data["share"];?> ครั้ง) &nbsp;&nbsp;</a>
			</p>
          </div>
          <div class="clr"></div>
		</form>
        </div>
<?php
}
?>		