<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catch me!</title>
    <style>
    .red-ball{
        position: absolute;
        top:5000;
        left:0;
        width:100px;
        height:15px;
    }
    </style>
</head>
<body>
    <h2>Catch me!</h2>
    <p>I want to catch this!!!</p>

    <div class="red-ball" onclick="give_me_flag();">😍 Click Me!</div>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).mousemove(function(e){
            $('.red-ball').css("top", e.pageY + 50);
            $('.red-ball').css("left", e.pageX + 60);
        });

        function give_me_flag() {
            $.post("./flag.php", {name:"catch",data:"t3SJtPuEhPtDTpy"}, function (data) {
                alert(data);
            });
        }
    </script>
</body>
</html>