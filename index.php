<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>training block</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Abel"/>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="js/main.js"></script>
        
    </head>
    <body>
        <div class="progress">
            <div class="determinate" style="width: 0%"></div>
        </div>
        <ul id="slide-out" class="sidenav">
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a class="waves-effect waves-light btn start">Start</a>
        <a class="waves-effect waves-light btn stop">Stop</a>
        <div class="exercises"></div>
        <canvas width="100" style="position: absolute; right: 0; top: 0; z-index: 9999;"></canvas>
    </body>
</html>
