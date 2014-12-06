function setLang(lang) {
	$.cookie('lang', lang, {expires: 365});
	location.reload();
}

function toggleSearch() {
	$('#search-sm').fadeToggle(400);	
}