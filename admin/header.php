<?php
function check_active($menu,$chk)
{
	if($menu==$chk)
	{
		$value=" class=\"active\"";
	}else{
		$value="";
	}
	return $value;
}
?>
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="?is=index">Information <span>Science</span> <small>Mahasarakham University</a>
		<?php
		/*
		if(!empty($_SESSION))
		{
			echo "<a href='#'>&#10000;แก้ไข</a>";
		}
		*/
		?>
		</small></h1>
      </div>
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="ค้นหาข้อมูล" type="text" />
          </span>
          <input name="button_search" src="../images/search.gif" class="button_search" type="image" />
        </form>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> 
<?php		
	$sql="select * from ".$CFG->prefix."slider where status=1 order by priority ASC";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs))
	{
          echo "<a href=\"".$data["link"]."\"><img src=\"".$CFG->wwwroot."/images/".$data["picture"]."\" width=\"940\" height=\"310\" alt=\"\" /> </a>";
	}
?>		
		</div>
<?php
if(!empty($_SESSION))
{
	echo "<font size=2><strong>&#10003;เพิ่ม | &#9832;จัดการ</strong></font><br>";
}
?>		
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
<?php		
	$sql="select * from ".$CFG->prefix."header where status=1 order by priority ASC";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs))
	{
          echo "<li".check_active($_GET["is"],$data["name"])."><a href='?is=".$data["name"]."'><span>".$data["fullname"]."</span></a></li>";
	}
	if(!empty($_SESSION))
	{
		echo "<li><a href='#'>&#9832; จัดการ</a></li>";		
		echo "<li".check_active($_GET["is"],$data["name"])."><a href='?is=logoff'><span>&#9746; ออกจากระบบ</span></a></li>";
	}
	
?>		  
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>