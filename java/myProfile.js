$(document).ready(function() {
	$("#details").css('white-space', 'pre-line');
	$("ed1").click(function() {
		var nickname = $("#nickname").text();

		$("#nickname").hide();
		$(".nickname").show().focus().val(nickname);
		$("ed1").hide();
		$("done1").show();

		$(".nickname").keypress(function (e) {
 			var key = e.which;
 			if(key == 13) {
 				var nickname2 = jQuery.trim($('.nickname').val());
				if (nickname2.length == 0) {
					nickname2 = nickname;
				};
				$.post("change.php",{
					nickname : nickname2
				}, function(data) {
					$("done1").hide();
					$(".nickname").hide();
					$("#nickname").show().text(nickname2);
					$("ed1").show();
				});
 			}
 		});

		$("done1").click(function() {
			var nickname2 = jQuery.trim($('.nickname').val());
			if (nickname2.length == 0) {
				nickname2 = nickname;
			};
			$.post("change.php",{
				nickname : nickname2
			}, function(data) {
				$("done1").hide();
				$(".nickname").hide();
				$("#nickname").show().text(nickname2);
				$("ed1").show();
			});
		});
	});
	$("ed2").click(function() {
		var city = $("#city").text();
		$("#city").hide();
		$(".city").show().focus().val(city);
		$("ed2").hide();
		$("done2").show();

		$(".city").keypress(function (e) {
 			var key = e.which;
 			if(key == 13) {
 				var city2 = jQuery.trim($('.city').val());
				if (city2.length == 0) {
					city2 = city;
				};
				$.post("change.php",{
					city : city2
				}, function(data) {
					$("done2").hide();
					$(".city").hide();
					$("#city").show().text(city2);
					$("ed2").show();
				});
			}
		});

		$("done2").click(function() {
			var city2 = jQuery.trim($('.city').val());
			if (city2.length == 0) {
				city2 = city;
			};
			$.post("change.php",{
				city : city2
			}, function(data) {
				$("done2").hide();
				$(".city").hide();
				$("#city").show().text(city2);
				$("ed2").show();
			});
		});
	});
	$("ed3").click(function() {
		var details = $("#details").text();
		$("#details").hide();
		$("#details").find('br').before(document.createTextNode('\n')).remove();
		$("#details").css('white-space', 'pre-line');
		$(".details").show().focus().val(details);
		$("ed3").hide();
		$("done3").show();

		$("done3").click(function() {
			var details2 = jQuery.trim($('.details').val());
			if (details2.length == 0) {
				details2 = details;
			};
			$.post("change.php",{
				details : details2
			}, function(data) {
				$("done3").hide();
				$(".details").hide();
				var regex = /<br\s*[\/]?>/gi;
				details2 = details2.replace(regex, "\r\n");
				$("#details").show().text(details2);
				$("ed3").show();
			});
		});
	});

		$("#del").click(function() {
			$(".del").animate({
				top : "100px",
				opacity : "1"
			}, 800);
			$(".delForm").delay(400).animate({
				opacity : "1"
			}, 400);
			$("#blackOut").css({
				width : "100%",
				height : "100%"
			});
			$("#blackOut").animate({
				opacity : "0.7"
			}, 800);
		});

		$("#no").click(function() {
			$(".del").animate({
				visibility : "hidden",
				top : "-200px"
			}, 800);
			$(".delForm").animate({
				opacity : "0"
			}, 500);
			$("#blackOut").animate({
				opacity : "0"
			}, 800);
			$("#blackOut").delay(800).animate({
				width : "0",
				height : "0"
			}, 100);
		});

});