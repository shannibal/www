$(document).ready( function() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'exercise'},
        success: function(response) {
            $.each(response, function(key, value) {
                if (value.set_parent != 1) {
                    return true;
                }
                if (value.set_parent != 1) {
                    return true;
                }
                if (value.set_id != null) {
                    //console.log(value);
                    if (!$(`.exercise_${value.exercise_name}`).length) {
                        console.log("create", value.exercise_name);
                        $(`.exercise`).append(`<div class="row exercise_${value.exercise_name}"><div class="col ${value.exercise_name} s12">${value.exercise_name}</div></div>`);
                        // $(`.exercise`).append(`<div class="row exercise ${value.exercise_name}"><div class="col s12">${value.exercise_name}</div></div>`);
                    } else {
                        //console.log("exists", value.exercise_name);
                    }
                    
                    console.log("add", value.exercise_name);
                    $(`.exercise_${value.exercise_name}`).append(`
                        <div class="row">
                            <div class="col s3">${value.set_id}</div>
                            <div class="col s3">&nbsp;</div>
                            <div class="col s3">${value.set_value} x ${value.set_repetition}</div>
                            <div class="col s3">${((value.set_percent/100) * value.exercise_pr).toFixed(0)} kg</div>
                        </div>
                    `);
                    

                }
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
});
