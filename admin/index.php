<?php
session_start();
require_once("../webcfg.php");
if(empty($_GET["is"])){
	$_GET["is"]="index";
}
if(empty($_GET["s"])){
	$_GET["s"]=$_GET["is"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>-:- ภาควิชาสารสนเทศศาสตร์ มหาวิทยาลัยมหาสารคาม ยินดีต้อนรับ -:-</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
<link rel="stylesheet" type="text/css" href="example.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/coin-slider.min.js"></script>
<script type='text/javascript' src='textboxio.js'></script>

<script>
  /*
  This function replaces all <textareas> on a page with
  instances of Textbox.io.
  */
  var instantiateTextbox = function () {
	textboxio.replaceAll('textarea', {
	  paste: {
		style: 'clean'
	  },
	  css: {
		stylesheets: ['example.css']
	  }
	});
  };

</script>
<script>
  /*
  This function gets the content from the instance of Textbox.io
  with the ID 'textbox'
  */
  var getEditorContent = function(){
	  var editors = textboxio.get('#textbox');
	  var editor = editors[0];
	  return editor.content.get();
  };
</script>
<script>
function checkConfirm(str)
{
	if(confirm('  กรุณายืนยันการลบข้อมูล  '+str+' อีกครั้ง !!!  ')){
		return true;
	}else{
		return false;
	}
}
</script>
</head>
<body onload="instantiateTextbox();">
<a name="top"></a>
<div class="main">
  <?php
	require_once("header.php");
  ?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
	  <?php
	  function get_path($menu,$table)
	  {
		  global $CFG,$conn;
		  $sql="select fullname from ".$CFG->prefix."$table where name='".$menu."'";
		  $rs=mysqli_query($conn,$sql);
		  $data=mysqli_fetch_assoc($rs);
		  return $data["fullname"];
	  }
	  ?>
	  <a href="?is=<?=$_GET["is"];?>"><?=get_path($_GET["is"],"header");?></a> > <?=get_path($_GET["s"],"sidebar");?>
	  <hr size=1 border=0 color=#ccc>
	  <?php
		if(empty($_GET["s"])&&empty($_GET["id"]))
		{
			$page=$_GET["is"]."_page.php";	
		}elseif(empty($_GET["id"])){
			$page=$_GET["s"]."_page.php";
		}else{
			$page="content.php";
		}
		require_once($page);
	  ?>        
      </div>
<?php
if(!empty($_SESSION))
{
?>	    
      <div class="sidebar">
		<div class="gadget">
          <h2 class="star"><span></span> <?=$_SESSION["fullname"];?></h2> <strong>&#10000; แก้ไข</strong>
          <div class="clr"></div>
		  <img src="<?=$CFG->wwwroot."/staff/".$_SESSION["picture"];?>" width="150px" height="180px">
		</div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2> <strong>&#9832; จัดการ</strong>
          <div class="clr"></div>
          <ul class="sb_menu">
<?php		
	$sql="select * from ".$CFG->prefix."sidebar where parent='".$_GET["is"]."' and status=1 order by priority ASC";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs))
	{
          echo "<li".check_active($_GET["s"],$data["name"])."><a href=\"?is=".$data["parent"]."&s=".$data["name"]."\">".$data["fullname"]."</a> ";
		  if(!empty($_SESSION))
		  {
			echo "&#10003;เพิ่ม | &#10008;ลบ | &#10000;แก้ไข ";
		  }		
		  echo "</li>";
	}
?>				
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>ลิงค์น่าสนใจ</span></h2> <strong>&#9832; จัดการ</strong>
          <div class="clr"></div>
          <ul class="ex_menu">
<?php		
	$sql="select * from ".$CFG->prefix."otherlink where status=1 order by priority ASC";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs))
	{
          echo "<li><a href='".$data["link"]."' target='_blank'>".$data["name"]."</a><br />
              ".$data["fullname"]."<br>";
		  if(!empty($_SESSION))
		  {
			echo "&#10003;เพิ่ม | &#10008;ลบ | &#10000;แก้ไข ";
		  }		
		  echo "</li>";			  
	}
?>		  
          </ul>
        </div>
      </div>
<?php
}
?> 
      <div class="clr"></div>
    </div>
  </div>
 
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>ภาพ</span> กิจกรรม</h2> 
		<?php
		if(!empty($_SESSION))
		{
			echo "<font size=2><strong>&#10003;เพิ่ม | &#10008;ลบ | &#10000;แก้ไข | &#9832;จัดการ</strong></font><br>";
		}
		?>
        <a href="#"><img src="../images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="../images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>วัตถุประสงค์ของหลักสูตร</span></h2>
		<?php
		if(!empty($_SESSION))
		{
			echo "<font size=2><strong>&#10000;แก้ไข</strong></font><br>";
		}
		?>
        <p>เพื่อผลิตบัณฑิตหลักสูตรศิลปศาสตรบัณฑิต สาขาวิชาสารสนเทศศาสตร์ ให้มีคุณลักษณะและคุณสมบัติดังต่อไปนี้</p>
        <ul class="fbg_ul">
          <li><a href="#">มีความรู้ความสามารถ ในการปฏิบัติงานในหน่วยงานบริการสารสนเทศ ตลอดจนสามารถประกอบอาชีพอิสระ</a></li>
          <li><a href="#">มีทักษะการวิจัย การสืบค้นสารสนเทศ และสามารถประยุกต์ความรู้ทางเทคโนโลยีสารสนเทศในการปฏิบัติงาน</a></li>
          <li><a href="#">มีคุณธรรม จริยธรรม และความศรัทธาในวิชาชีพสารสนเทศศาสตร์</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>การติดต่อ</span>ภาควิชา</h2>
		<?php
		if(!empty($_SESSION))
		{
			echo "<font size=2><strong>&#10000;แก้ไข</strong></font><br>";
		}
		?>		
        <p><span>ภาควิชาสารสนเทศศาสตร์ </span></p>
        <p class="contact_info"> <span>ที่อยู่:</span>คณะวิทยาการสารสนเทศ <br />
		มหาวิทยาลัยมหาสารคาม<br />
		ตำบลขามเรียง อำเภอกันทรวิชัย<br />
		จังหวัดมหาสารคาม 44150<br />
          <span>โทรศัพท์:</span> 0-4375-4359<br />
          <span>FAX:</span> 0-4375-4359<br />
          <span>E-mail:</span> <a href="#">patorn.n@msu.ac.th</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; ภาควิชาสารสนเทศศาสตร์ คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</p>
      <p class="rf">Facebook Fan Page : <a href="https://web.facebook.com/InfoSciMSU/" target="_blank">InfoSciMSU</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
<div align=center><h3><a href="#top">&#x21e7; กลับด้านบน &#x21e7;</a></h3></div>
</body>
</html>