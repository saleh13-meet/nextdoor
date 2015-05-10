$(document).ready(function() {
	var st = $(".start");
	var ev = $(".event-button");
	var name = $(".event-name");
	ev.css({
		opacity: "0",
		transition: "0s"
	});
	st.css({
		paddingTop: "0",
		opacity: "0"
	});
	st.animate({
		paddingTop: "30px",
		opacity: "1"
	}, 1500);
	ev.css({transition: "0.3s"}).delay(1500).animate({opacity: "1"},1000);
	ev.click(function() {
		var eve = $(this).attr("id");
		if (eve == 'cooking') {
			$.ajax({
				url: "events.php",
				type: "POST",
				data: {cooking: "1"},
				success: function(data) {
					name.text("cooking");
				}
			});
		};
		if (eve == 'sports') {
			$.ajax({
				url: "events.php",
				type: "POST",
				data: {sports: "1"},
				success: function(data) {
					name.text("sports");
				}
			});
		};
		if (eve == 'computers') {
			$.ajax({
				url: "events.php",
				type: "POST",
				data: {computers: "1"},
				success: function(data) {
					name.text("computers");
				}
			});
		};
	});

});