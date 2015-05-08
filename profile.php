<?php
	
	session_start();
	include 'functions.php';
	connect("u839756306_saleh");
	check_logged_in_and_active();
	$id1 = $_SESSION['id'];
	$id2 = $_GET['id'];

	if($id1 == $id2){
		header('Location:myProfile.php?id='.$id2);
	}

	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 1024px)' href='css/index-1024.css' />
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />
		<script type='text/javascript' src='java/addFriend.js'></script>", "");

?>
		<div id="prof_pic">
  			<div class="pictureAndButtonDiv">
    			<div class="cell">
					
					<img src="images/profile/
					<?php
						$x = info_img($id2);
						if ($x == NULL) {
							$_SESSION['user'] = true;
							header("location:home.php");
							die();
						}
						if($x == 'default.jpeg'){
							echo info_img($id2);
						}else{
							echo $id2 . '/';
							echo info_img($id2);
						}
					?>">




				</div>
			</div>
		</div>
		<div id="info"><span>
			<?php info_prof2($id2) ?>
		</span>
			<br><br>
			<?php
				$sql = "SELECT * FROM friends WHERE user2 = '$id2' AND user1 = '$id1' OR user1 = '$id2' AND user2 = '$id1'";
				$result = mysql_query($sql);
				if (mysql_num_rows($result) == 0) {
					echo '<form method="POST" action="addFriend.php">
							<input type="hidden" value="'. $id2 .'" name="user2">
							<input type="submit" id="add" value="add as friend">
						</form>';
				}else{
					echo "<label style='color: blue;'>friends</label>";
				}
			?>
		</div>
	</body>
</html>