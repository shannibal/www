$(document).ready( function() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'get_macro'},
        success: function(response) {
            $.each(response, function(index, value) {
                console.log(index, value);
                $("div.test").append("<div></div>");
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
});

function test() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'get_macro'},
        success: function(response) {
            $.each(response, function(index, value) {
                console.log(index, value);
                $("div.test").append("<div>" + "</div>");
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function myFunction() {
    $.ajax({
        type: "post", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'test'},
        success: function(response) {
            $.each(response, function(index, value) {
                console.log("index", index, "value", value);
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}