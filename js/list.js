$(document).ready( function() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'macro'},
        success: function(response) {
            $.each(response, function(key, value) {
                $(".collapsible").append(`
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>${value.name}</div>
                        <div class="collapsible-body" id="macro${key}"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                `);
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
    $('.collapsible').collapsible({onOpenStart: function () {
            test();
        }
    });
    
});

function test() {
    $.ajax({
        type: "get", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'func': 'meso'},
        success: function(response) {
            $.each(response, function(key, value) {
                console.log(value.parent);
                if ($(`#meso.collapsible`).length) {
                    $(`#macro${value.parent}.collapsible-body`).empty();
                } else {
                    $(`#macro${value.parent}.collapsible-body`).append(`
                        <ul class="collapsible" id="meso">
                        </ul>
                    `);
                };
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
    $('.collapsible').collapsible({onOpenStart: function () {
            test();
        }
    });
};