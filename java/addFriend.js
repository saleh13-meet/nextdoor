$(document).ready(function() {
	$("#add").click(function(){
		$(this).unbind('click');
		var user2 = $("#user2");
		$.post("../addFriend.php",{
			user2 : user2
		}, function(data){
			
		});
	});
});