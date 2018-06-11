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
    $('canvas').drawText({
        layer: true,
        name: 'text',
        fillStyle: 'red',
        x: 12, y: 24,
        fontSize: 12,
        fontFamily: 'Verdana, sans-serif',
        text: ''
    });

    setInterval( function() {
        var value = ((new Date - start) / 1000).toFixed(0);
        $('canvas').setLayer('myBox', {
            fillStyle: `rgb(${value}, ${value * 2}, ${value / 2})`,
            start: "+=3.6"
        }).drawLayers();
        $('canvas').setLayer('text', {
            fillStyle: `rgb(${value*2}, 0, 0)`,
            text: `${value*2}`
        }).drawLayers();
        if (value == 255) {
            start = new Date;
        }
    }, 100);

});