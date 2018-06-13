var timerVariable;
var i = 0;

$(document).ready( function() {
    $('canvas').prop('height', window.innerHeight);

    $('.btn.start').click( function() {
        window.clearInterval(timerVariable);
        $('canvas').drawLine({
            layer: true,
            strokeStyle: '#000',
            strokeWidth: 1,
            x1: 10, y1: i,
            x2: 20, y2: i
        });
        $('canvas').drawLine({
            layer: true,
            strokeStyle: '#000',
            strokeWidth: 2,
            x1: 20, y1: i,
            x2: 20, y2: i
        });
        timerVariable = setInterval(function() {
            if (i > 100) {
                i = 0;
            } else {
                i++;
            }
            $('canvas').setLayer(-1, {
                strokeStyle: 'red',
                y2: i
            }).drawLayers();
        }, 100);
    });
    $('.btn.stop').click( function() {
        window.clearInterval(timerVariable);
        $('canvas').drawLine({
            layer: true,
            strokeStyle: '#000',
            strokeWidth: 1,
            x1: 20, y1: i,
            x2: 10, y2: i
        });
        $('canvas').drawLine({
            layer: true,
            strokeStyle: '#000',
            strokeWidth: 2,
            x1: 10, y1: i,
            x2: 10, y2: i
        });
        timerVariable = setInterval(function() {
            if (i > 100) {
                i = 0;
            } else {
                i++;
            }
            $('canvas').setLayer(-1, {
                strokeStyle: 'green',
                y2: i
            }).drawLayers();
        }, 100);
    });
});
