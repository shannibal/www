function test() {
    $.ajax({
        type: "post", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'get_macro'},
        success: function(response) {
            $.each(response, function(index, value) {
                console.log("index", index, "value", value);
                if (!$("div.macro#" + value.macro_id).length) {
                    $("div.test").append("<div class='macro' id='" + value.macro_id + "'>" + value.macro_id + "</div>");
                }
                $("div.macro#" + value.macro_id).append("<div class='meso' id='" + value.meso_id + "'>" + value.meso_name + "</div>");
                $("div.meso#" + value.meso_id).append("<div class='micro' id='" + value.micro_id + "'>" + value.micro_name + "</div>");
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
                if ($("div#" + value.cycle_id + ".micro").length) {
                    $("div#" + value.cycle_id + ".micro").ready(function() {this.css("background:red;")});
                    $("div#" + value.cycle_id + ".micro").append("<div class='exercise_set' id='" + value.exercise_id + "'></div>")
                    $("div#" + value.exercise_id + ".exercise_set").append("<div class='exercise' id='" + value.exercise_id + "'>" + value.exercise_name + "</div>");
                    $("div#" + value.exercise_id + ".exercise_set").append("<div class='set'>1x</div><div class='set'>1x</div>");

                }
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}