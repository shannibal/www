$(document).ready(function(){
	$("#login").click(function(){
		check_login($("#user").val(), $("#pass").val());
	});
});

function check_login(user, password) {
	$.ajax({
		type: "post", dataType: "json",
		cache: false, async: true,
		url: "/php/ajax.php",
		data: {'u': user, 'p': password, 'query': '!!!'},
		success: function(response) {
			$("body").append(JSON.stringify(response));
		},
		error: function(response) {
			$("#login").css("border", "2px solid red");
		}
	});
}