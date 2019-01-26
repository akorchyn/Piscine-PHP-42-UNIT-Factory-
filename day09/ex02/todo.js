window.onload = function () {
	var arr = document.cookie.split('; ');
	for (var i = 0; arr[i]; i++) {
		arr[i] = arr[i].trim();
		var sp = document.createElement("div");
		var name = arr[i].substring(14);
		var TheFirstChild = document.getElementById("ft_list").firstChild;
		sp.id = arr[i].substring(0, 13);
		sp.innerHTML = name;
		document.getElementById("ft_list").insertBefore(sp, TheFirstChild);
		sp.addEventListener("click", function(){
			delCook(event.target);
		});
	}
}

function delCook(sp) {
	var answ = confirm("Are you sure?");
	if (answ == true) {
		sp.remove();
		document.cookie = sp.id + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
}

function getToDo() {
	var date = new Date(new Date().getTime() + 24 * 3600 * 1000);
	var toDo = prompt("Get your toDo: ");
	// toDo = toDo.trim();
	if (toDo != null && toDo != "") {
		document.cookie= date.getTime() + "="+toDo+"; expires=" + date.toUTCString();
		location.reload();
	}
}