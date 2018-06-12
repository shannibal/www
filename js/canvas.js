$(document).ready( function() {
    var start = new Date;
    $('canvas').prop('height', window.innerHeight);

    $('canvas').drawSlice({
        layer: true,
        name: 'myBox',
        fillStyle: 'red',
        x: 20, y: 20,
        radius: 20
    });

    for (var i = 1; i < 25; i++) {
        $('canvas').drawText({
            layer: true,
            name: `text${i}`,
            fillStyle: 'red',
            x: 22, y: i * 22,
            fontSize: 18,
            fontFamily: 'Verdana, sans-serif',
            text: 'x',
            click: function(layer) {
                $(this).animateLayer(layer, {
                    rotate: 0
                });
            }
        });
    }
    setInterval( function() {
        var value = ~~((new Date - start) / 1000);
        $('canvas').setLayer(value, {
            fillStyle: `rgb(${value * 10}, +=5, 127)`,
            text: `${value}`
        }).drawLayers();
        $('canvas').animateLayer(value, {
            rotate: '+=100'
        });
        if (value == 25) {
            start = new Date;
        }
    });

});