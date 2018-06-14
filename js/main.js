$.getScript("/js/base_object.js", function() {
   $.data(document.body, "test", new Test());
});

$(document).ready( function() {
    $('.sidenav').sidenav();

    createExercises();

    $('.btn.stop').click( function() {
        $.data(document.body, "micro", 1);
        createExercises();
    });

    $('.btn.start').click( function() {
        $.data(document.body, "micro", 2);
        createExercises();
    });
});

function createExercises() {
    $(".exercises").empty();
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'exercise'},
        success: function(response) {
            $.each(response, function(key, value) {
                if (value.set_parent != $.data(document.body, "micro")) {
                    return true;
                }
                if (value.set_id != null) {
                    //console.log(value);
                    if (!$(`#${value.exercise_name}.exercise`).length) {
                        console.log("create", value.exercise_name);
                        $(`.exercises`).append(`<div class="row exercise" id="${value.exercise_name}"><div class="col ${value.exercise_name} s12">${value.exercise_name}</div></div>`);
                        // $(`.exercise`).append(`<div class="row exercise ${value.exercise_name}"><div class="col s12">${value.exercise_name}</div></div>`);
                    } else {
                        //console.log("exists", value.exercise_name);
                    }
                    
                    console.log("add", value.exercise_name);
                    $(`#${value.exercise_name}.exercise`).append(`
                        <div class="col s3">${value.set_id}</div>
                        <div class="col s3">&nbsp;</div>
                        <div class="col s3">${value.set_value} x ${value.set_repetition}</div>
                        <div class="col s3">${((value.set_percent/100) * value.exercise_pr).toFixed(0)} kg</div>
                    `);
                    
                }
            });
            // $(".exercises").last().css("background-color", "pink" );
        },
        error: function(response) {
            console.log(response);
        }
    });

}
