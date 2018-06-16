$.getScript("/js/base_object.js", function() {
    console.log(gym.get_exercises());
   // $.data(document.body, "test", new Test());
});

$(document).ready( function() {
    $('.sidenav').sidenav();
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'exercise'},
        success: function(response) {
            $.each(response, function(key, value) {
                if (!(value.exercise_id in gym.get_exercises())) {
                    var exercise = new gym.Exercise(value);
                }
                var set = new gym.Set(value);
                console.log(set.toString())
                // console.log(set, set.exercise);
            });
        },
        error: function(response) {
            console.log(response);
        }
    });

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

    $.each(gym.get_exercises(), function() {
        // var elem = $(".exercises").append(this.toString());
        var elem = $(this.toString()).appendTo(".exercises");
        this.elem = elem;
        console.log(">", elem);
    });

    $.each(gym.get_sets(), function() {
        this.exercise.elem.append(this.toString());
        // $(`#${this.exercise.name}`).append(this.toString());
    });

    $.each(gym.get_exercises(), function() {
        this.elem.append('<div class="col s12 exercise_new"><a class="btn">Add</a><div/>');
    });

}
