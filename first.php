<?php

	session_start();
	include 'functions.php';

	connect("u839756306_saleh");

	header3("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
	<script type='text/javascript' src='java/jquery-ui.js'></script>
	<script src='java/jquery.validationEngine-en.js' type='text/javascript'></script>
	<script src='java/first.js' type='text/javascript'></script>
	<script src='java/jquery.validationEngine.js' type='text/javascript'></script>
	<link rel='stylesheet' href='css/validationEngine.jquery.css' type='text/css'/>");

?>

	<script>
	    $(document).ready(function(){
	    	$("#formID").validationEngine('attach');
       });
    </script>

    <br><br><br><br>

    <!-- <button id="left">&laquo;</button><br><br> -->
	<input type="button" id="right" class="right" value="NEXT">

    <div id="container_first">

    	<form id="formID">
			<div id="info25">
				<label>
					<br><br>Mobile Number:<br><br><br><br><br><br>
				</label>
				<input type="text" placeholder="0541236789" class="validate[custom[phone]]" id="mobile"><br><br><br>
			</div>
			<div id="info25">
				<label>
					<br><br>NickName:<br><br><br><br><br><br>
				</label>
				<input type="text"  id="nickname"><br><br><br>
			</div>
			<div id="info25">
				<label>
					<br><br>City:<br><br><br><br><br><br>
				</label>
				<input type="text" id="city"><br><br><br>	
				</div>
			<div id="info25">
				<label>
					<br><br>Details (about yourself):<br><br><br>
				</label>
				<!-- <input type="textarea" name="mobile"><br><br><br> -->
				<textarea rows="6" cols="50" id="details"></textarea>
			</div><!-- 
			<div id="info25">
				<label>
					<br><br>QA:<br><br><br><br><br><br>
				</label>
				<input type="text" name="mobile"><br><br><br>
			</div> -->
			<input type="button" value="FINISH" id="sub10">
		</form>
	</div>
</body>
</html>