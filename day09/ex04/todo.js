$("document").ready(function() {
    get_content();
});

function get_content() {
    $.ajax({
        url: "select.php",
        dataType: 'text',
        success: function (text) {
            $('#ft_list').empty();
            var array = text.split('\n');
            for (i = 0; array[i]; i++) {
                line = array[i].split(';');
                var date = line[0];
                var name = line[1];
                $("#ft_list").prepend("<div id='" + date + "'>" + name + "</div>");
                $("#" + date).click(function () {
                    answ = confirm("Are you sure?");
                    if (answ == true) {
                        id = $(this).attr('id');
                        $.ajax({
                            type: "POST",
                            url: "delete.php",
                            data: {'name': id}
                        });
                        $(this).remove();
                    }
                });
            }
        }
    });
}

function add_new() {
    var name = new Date().getTime();
    var value = prompt("Get your toDo: ");
    value = value.trim();
    if (value != null && value != "") {
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: {'name': name, 'value': value},
        });
        get_content();
    }
}
