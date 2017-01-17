<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Session #<?php echo($_GET['id']) ?></title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">	
    </script>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="static/js/game.js"></script>
</head>
<body>
    <p>Hello World ! This is session number <?php echo($_GET['id']) ?></p>
    <canvas id="canvas" width="500" height="500" tabindex="1"></canvas>
    <button id="ready">I'm ready !</button>
</body>
</html>
