$("document").ready(function() {
	var arr = document.cookie.split('; ');
	for (i = 0; arr[i]; i++) {
		name = arr[i].substring(14);
		date = arr[i].substring(0, 13);
		$("#ft_list").prepend("<div id='" + date + "'>" + name + "</div>");
		$("#" + date).click(function(){
			answ = confirm("Are you sure?");
			if (answ == true) {
				id = $(this).attr('id');
				document.cookie = id + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
				$(this).remove();
			}
		});
	}
	$("#button").click(function(){
		var date = new Date(new Date().getTime() + 24 * 3600 * 1000);
		var toDo = prompt("Get your toDo: ");
		toDo = toDo.trim();
		if (toDo != null && toDo != "") {
			document.cookie = date.getTime() + "=" + toDo + "; expires=" + date.toUTCString();
			location.reload();
		}
	});
});