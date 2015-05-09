function findFriend () {
	var min_length = 1;
	var friend = $("#friends").val();

	if (friend.length >= min_length) {
		$.ajax({
			url: 'friends_refresh.php',
			type: 'POST',
			data: {friend:friend},
			success: function(data){
				$("#my_friends").hide();
				$("#find").show().html(data);
			}
		});
	};
	if (friend.length == 0) {
		$("#my_friends").show();
		$("#find").hide();
	};
}