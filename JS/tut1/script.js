function setText() {
	$(this).val("Select...");
	$(this).removeClass("black");
	$(this).addClass("grey");
}

function unsetText() {
	$(this).val("");
	$(this).removeClass("grey");
	$(this).addClass("black");
}

setText.call($('input.search'));

$('input.search').on('focus',function () {	
	if ($(this).val() == "Select...") 
		unsetText.call($(this));
})

$('input.search').on('blur',function () {
	if ($(this).val() == "")
		setText.call($(this));
})
