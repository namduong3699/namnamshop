$(document).ready(function(){
	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#dataTables tr.tr_s").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	$('.showbody').hide();
	$('#show').on('click',function(){
		$('.showbody').toggle(400);
	})
});
// $(document).ready(function() {

// });