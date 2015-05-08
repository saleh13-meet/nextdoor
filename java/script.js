// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 1; // min caracters to display the autocomplete
	var keyword = $('#users_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#users_list_id').show();
				$('#users_list_id').html(data);
				if (data == "") {$('#users_list_id').html("<center>no results</center>")};
				$('#users_id').focus(function() {
					if (keyword.length >= min_length) {
						$('#users_list_id').show();
					}
				});
			}
		});
	} else {
		$('#users_list_id').hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#users_id').val(item);
	// hide proposition list
	$('#users_list_id').hide();
}

$(document).mouseup(function (e)
{
    var container = $("#users_id");
    var container2 = $("#users_list_id");

    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container.has(e.target).length === 0){container2.hide();}
});