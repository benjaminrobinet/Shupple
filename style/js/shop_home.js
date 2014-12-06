function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		$(this).height('');
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.each(function() { $(this).height(tallest); });
} 

$(document).ready(function() {
	equalHeight($(".equalHeight"));

	$(window).resize(function() {
		equalHeight($(".equalHeight"));
	});
});