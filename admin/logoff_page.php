<?php
session_destroy();
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">

		<div class="article">
          <h2><span>เข้าสู่ระบบจัดการเว็บไซต์</span> </h2>
          <form action="index.php" method="post">
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
					<span class="cell"><input type="submit" name="submit" value="เข้าสู่ระบบ"><br /></span>
				  </div>
				</div>	
			</p>
          </div>
		  </form>
          <div class="clr"></div>
        </div>