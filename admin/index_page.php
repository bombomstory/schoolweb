<?php
if(!empty($_POST["submit"])&&empty($_SESSION))
{
	$user=$_POST["username"];
	$password=$_POST["password"];
	$sql="select * from ".$CFG->prefix."profiles as a,".$CFG->prefix."admins as b  where a.id=b.id and a.username='".$_POST["username"]."'";	
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	$hash=$data["password"];
	if (password_verify($_POST["password"], $hash)) { 
		$_SESSION["id"]=$data["id"];
		$_SESSION["username"]=$data["username"];
		$_SESSION["fullname"]=$data["fullname"];
		$_SESSION["picture"]=$data["picture"];
		$_SESSION["mobile"]=$data["mobile"];
		$_SESSION["email"]=$data["email"];
?>
		<div class="article">
          <h2><span>ยินดีต้อนรับเข้าสู่ระบบจัดการเว็บไซต์</span> </h2>
          <form action="" method="post">
          <div class="clr"></div>
          <div class="post_content">
            <p align="center"><b>คุณเข้าสู่ระบบในชื่อ <?=$_SESSION["fullname"];?></b></p>
            <p align="center">
				<span class="cell"><image src="<?=$CFG->wwwroot."/staff/".$_SESSION["picture"];?>" width="150px" height="200px"></span>
				<br />
				<span class="cell"><input type="submit" name="submit" value="&#10003; ดำเนินการต่อ"><br /></span>			
			</p>
          </div>
		  </form>
          <div class="clr"></div>
        </div>
<?php				
	} else { 
		echo '<h1>รหัสผ่านไม่ถูกต้อง!!</h1>'; 
	}
}else{
	if(!empty($_SESSION))
	{
		require_once("../index_page.php");
	}else{
?>

		<div class="article">
          <h2><span>เข้าสู่ระบบจัดการเว็บไซต์</span> </h2>
          <form action="" method="post">
          <div class="clr"></div>
          <div class="post_content">
            <p>กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ถูกต้อง</p>
            <p class="spec">
				<div id="table">
				  <div class="row">
					<span class="cell"><label>Username: </label></span>
					<span class="cell"><input type="text" name="username"></span>
				  </div>
				  <div class="row">
					<span class="cell"><label>Password: </label></span>
					<span class="cell"><input type="password" name="password"></span>
				  </div>
				  <div class="row">
					<span class="cell"></span>
					<span class="cell"><input type="submit" name="submit" value="&#10003; เข้าสู่ระบบ"><br /></span>
				  </div>
				</div>				
			</p>
          </div>
		  </form>
          <div class="clr"></div>
        </div>
<?php
	}
} 
?>