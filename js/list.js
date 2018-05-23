$(document).ready( function() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'get_macro'},
        success: function(response) {
            $.each(response, function(key, value) {
                $.each(value, function(i, v) {
                    switch(key) {
                        case "macro":
                            $("body").append(`<div class="collection" id='${key + v.id}'>${v.name}</div>`);
                            break;
                        case "meso":
                            $(`div#macro${v.parent}`).append(`<div class="col s12 m2" id='${key + v.id}'><div class="z-depth-${v.id}">${v.name}</div></div>`);
                            break;
                        case "micro":
                            $(`div#meso${v.parent}`).append(`<div id='${key + v.id}'>${v.name}</div>`);
                            break;
                        case "exercise":
                            $(`div#micro${v.parent}`).append(`<div id='${key + v.id}'>${v.name}</div>`);
                            break;
                        case "set":
                            $(`div#exercise${v.parent}`).append(``);
                            break;
                        default:
                            console.log(response);
                    }
                });
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
});