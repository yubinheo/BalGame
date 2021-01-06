<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Never End Game</title>
    <style>
        canvas { background: #eee; }
    </style>
</head>
<body>
    <h1>This game doesn't end forever. <br />But if you can score 198756213465, you can finish this game.</h1>
    <br />
    <canvas id="myCanvas" width="480" height="320"></canvas>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var ballRadius = 10;
        var x = canvas.width/2;
        var y = canvas.height-30;
        var dx = 5;
        var dy = -5;
        var paddleHeight = 10;
        var paddleWidth = 75;
        var paddleX = (canvas.width-paddleWidth)/2;
        var rightPressed = false;
        var leftPressed = false;
        var brickRowCount = 5;
        var brickColumnCount = 3;
        var brickWidth = 75;
        var brickHeight = 20;
        var brickPadding = 10;
        var brickOffsetTop = 30;
        var brickOffsetLeft = 30;
        var score = 0;

        var bricks = [];
        for(var c=0; c<brickColumnCount; c++) {
        bricks[c] = [];
        for(var r=0; r<brickRowCount; r++) {
            bricks[c][r] = { x: 0, y: 0, status: 1 };
        }
        }

        document.addEventListener("keydown", keyDownHandler, false);
        document.addEventListener("keyup", keyUpHandler, false);

        function keyDownHandler(e) {
            if(e.key == "Right" || e.key == "ArrowRight") {
                rightPressed = true;
            }
            else if(e.key == "Left" || e.key == "ArrowLeft") {
                leftPressed = true;
            }
        }

        function keyUpHandler(e) {
            if(e.key == "Right" || e.key == "ArrowRight") {
                rightPressed = false;
            }
            else if(e.key == "Left" || e.key == "ArrowLeft") {
                leftPressed = false;
            }
        }
        function collisionDetection() {
            for(var c=0; c<brickColumnCount; c++) {
                for(var r=0; r<brickRowCount; r++) {
                    var b = bricks[c][r];
                    if(b.status == 1) {
                        if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) {
                            dy = -dy;
                            b.status = 0;
                            score++;
                            if(score >= 198756213465) {

                                $.post("./flag.php", {name:"iswin",data:"198756213465"}, function (data) {
                                    alert(data);
                                });
                                clearInterval(interval);
                                
                            }
                        }
                    }
                    }
            }
        }

        function drawBall() {
        ctx.beginPath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = "#0095DD";
        ctx.fill();
        ctx.closePath();
        }
        function drawPaddle() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = "#0095DD";
        ctx.fill();
        ctx.closePath();
        }
        function drawBricks() {
        for(var c=0; c<brickColumnCount; c++) {
            for(var r=0; r<brickRowCount; r++) {
            if(bricks[c][r].status == 1) {
                var brickX = (r*(brickWidth+brickPadding))+brickOffsetLeft;
                var brickY = (c*(brickHeight+brickPadding))+brickOffsetTop;
                bricks[c][r].x = brickX;
                bricks[c][r].y = brickY;
                ctx.beginPath();
                ctx.rect(brickX, brickY, brickWidth, brickHeight);
                ctx.fillStyle = "#0095DD";
                ctx.fill();
                ctx.closePath();
            }
            }
        }
        }
        function drawScore() {
        ctx.font = "16px Arial";
        ctx.fillStyle = "#0095DD";
        ctx.fillText("Score: "+score, 8, 20);
        }

        function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBricks();
        drawBall();
        drawPaddle();
        drawScore();
        collisionDetection();

        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
            dx = -dx;
        }
        if(y + dy < ballRadius) {
            dy = -dy;
        }
        else if(y + dy > canvas.height-ballRadius) {
            if(x > paddleX && x < paddleX + paddleWidth) {
            dy = -dy;
            }
            else {
                if(confirm("Game Over, You want restart?")) {
                    document.location.reload();
                    clearInterval(interval); // Needed for Chrome to end game
                } else {
                    alert("Refresh (f5) to restart!");
                    throw "Please Stop";
                    
                }
                
            }
        }

        if(rightPressed && paddleX < canvas.width-paddleWidth) {
            paddleX += 2;
        }
        else if(leftPressed && paddleX > 0) {
            paddleX -= 2;
        }

        x += dx;
        y += dy;
        }

        var interval = setInterval(draw, 10);

    </script>
    
</body>
</html>