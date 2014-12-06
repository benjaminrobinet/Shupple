$(".shopForm").each(function(i) {
		$(this).find('#shopNameInput').keyup(function update(e) {
		var enterVal = $(this).val();
		var shopName = $(this).next().val();
		var shopId = $(this).next().next().val();

		if(enterVal == shopName) {
			$('#modal-'+shopId).find('#deleteButton').removeAttr("disabled");
		}
		else {
			$('#modal-'+shopId).find('#deleteButton').attr("disabled", "");
		}
		console.log(shopId);
	});
});