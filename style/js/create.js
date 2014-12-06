$("#name").keyup(function update() {
	var val = $('#name').val().replace(/[\W_]/g, "").toLowerCase();
	if(val !== '') {
		$('#name_help').fadeIn();
		$('#name_val_help').text(val);

		if(val.length <= 4) {
			$('#name_help > strong').attr('class', 'red');
			$('#create').attr('disabled', '');
		} else {
			$('#name_help > strong').attr('class', 'green');
			$('#create').removeAttr('disabled');
		} 
	} else {
		$('#name_help').fadeOut();
		$('#create').attr('disabled', '');
	}
});