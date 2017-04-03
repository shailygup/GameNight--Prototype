
/*globals $:false */
$(document).ready(function () {
	$("#calendar").show();
	$("#invite").hide();
	$("#createEvent").hide();
	$("#settings").hide();
	$("#friends").hide();
	$("#profile").hide();

	$("#mCalendar").click(function ()  {
		$("#calendar").show();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").hide();
	});

	// function calendarRedirect() {
	// 	$("#calendar").show();
	// 	$("#invite").hide();
	// 	$("#createEvent").hide();
	// 	$("#settings").hide();
	// 	$("#friends").hide();
	// 	$("#profile").hide();
	// };

	// $("#eventCal").click(function ()  {
	// 	$("#calendar").show();
	// 	$("#invite").hide();
	// 	$("#createEvent").hide();
	// 	$("#settings").hide();
	// 	$("#friends").hide();
	// 	$("#profile").hide();
	// });


	$("#mInvite").click(function () {
		$("#calendar").hide();
		$("#invite").show();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").hide();
	});

	$("#mCreateEvent").click(function () {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").show();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").hide();
	});
	$("#mProfile").click(function () {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").show();
	});
	$("#mFriends").click(function () {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").show();
		$("#profile").hide();
	});
	$("#rst").click(function ()  {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").show();
	});
	$("#back").click(function ()  {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").hide();
		$("#friends").hide();
		$("#profile").show();
	});

	$("#mSettings").click(function () {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").show();
		$("#friends").hide();
		$("#profile").hide();
		$("#editProfile").show(); 
		$("#changePass").hide();
		$("#emailPref").hide();
	});
	$("#updateInfo").click(function () {
		$("#calendar").hide();
		$("#invite").hide();
		$("#createEvent").hide();
		$("#settings").show();
		$("#friends").hide();
		$("#profile").hide();
		$("#editProfile").show(); 
		$("#changePass").hide();
		$("#emailPref").hide();
	});
	
	$("#mEditProfile").click(function () {
		$("#editProfile").show(); 
		$("#changePass").hide();
		$("#emailPref").hide();
	});
	$("#mChangePass").click(function () {
		$("#editProfile").hide(); 
		$("#changePass").show();
		$("#emailPref").hide();
	});
	$("#mEmailPref").click(function () {
		$("#editProfile").hide(); 
		$("#changePass").hide();
		$("#emailPref").show();
	});
	
});