$(document).ready(function() {
   	$(".poziom2").sortable({ 
		connectWith: ".poziom2",
		receive: function(event, ui) { 
			var id = $(ui.item).attr('id');
			var kolumna = this.id;
			$.ajax({ 
			   url: "sort_kolumna.php",
			   type: "GET",
			   data: {
				'id': id,
				'kolumna': kolumna
				},
			}); 
		}, 
	}) 
});
$(document).ready(function(){
	$( ".poziom2" ).sortable({
		placeholder : "ui-state-highlight",
		update  : function(event, ui) {
			var sort_id = new Array();
			$('.poziom2 li').each(function(){
				sort_id.push($(this).attr("id"));
			});
			$.ajax({
				url:"sort.php",
				method:"POST",
				data:{sort_id:sort_id},
				success:function(data) {
					window.location.reload();
				}
			});
		}
	});
});
$(document).ready(function(){
	$('.toggle_punkt').mouseover(function(){
	$(this).next('.form_punkt').slideToggle();
	});
});	
$(document).ready(function() {
	$('.toggle_punkt').mouseover(function() {
		$('.punkt').focus();
	});
});
$(document).ready(function() {
	$('.podpunkt').mouseover(function() {
		$(this).focus();
	});
	$('.tytul').mouseover(function() {
		$(this).focus();
	});
	
	$('textarea').on({input: function(){
		var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
		$(this).css({'height':totalHeight});
	}
});
});