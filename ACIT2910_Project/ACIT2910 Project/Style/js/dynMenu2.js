$(document).ready(function () {
	$("#attending").show();
	$("#suggested").hide();
	$("#games").hide();

	$("#mAttending").click(function() {
		$("#attending").show();
		$("#suggested").hide();
		$("#games").hide();
	});

	$("#mSuggested").click(function() {
		$("#attending").hide();
		$("#suggested").show();
		$("#games").hide();
	});

	$("#mGames").click(function() {
		$("#attending").hide();
		$("#suggested").hide();
		$("#games").show();
	});

	$("#mCalendar").click(function ()  {
		$("#calendar").show();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").hide();
	});
});