<?php
	
	session_start();
	include 'functions.php';
	connect("u839756306_saleh");
	check_logged_in_and_active();
	$id = $_GET['id'];
	$id2 = $_SESSION['id'];

	if ($id != $id2){
		header("location:profile.php?id=".$id);
	}

	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 1024px)' href='css/index-1024.css' />
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />
		<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/myProfile.js'></script>
		<script type='text/javascript' src='java/jquery-ui.js'></script>", "");

?>

		<div id="prof_pic">
  			<div class="pictureAndButtonDiv">
    			<div class="cell">
					
					<img src="images/profile/<?php
						$x = info_img($id);
						if($x == 'default.jpeg'){
							echo info_img($id);
						}else{
							echo $id . '/';
							echo info_img($id);
						}
					?>">


					<a href="test.php"><input id="change" type="button" value="Change Picture"></a>


				</div>
			</div>
		</div>
		<div id="info">
			<?php 
			info_prof($id);
			?>
		</div>
		<div id="blackOut"></div>
			<div class="del">
				<form class="delForm" action="del.php" method="POST">
					<br>
					<center><label>U sure nig?</label></center>
					<br>
					<input type="submit" value="YES"><input type="button" id="no" value="I ain't got enough balls">
				</form>
			</div>
		<input id="del" type="button" value="DELETE ACCOUNT">
	</body>
</html>
