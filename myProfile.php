<?php
	
	session_start();
	include 'functions.php';
	connect("u839756306_saleh");
	check_logged_in_and_active();
	$id = $_GET['id'];

	if ($id != $id2){
		header("location:profile.php?id=".$id);
	}

	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 1024px)' href='css/index-1024.css' />
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />");

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
			<br><br><br><br>
		</div>
	</body>
</html>