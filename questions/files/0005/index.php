<?php 
include "../../../db.php";
if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후 이용가능합니다.'); history.back(-1);</script>";
} 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Cross Cross!!!</title>
</head>
<body>
    <h2>Cross Cross Cross!!!</h2>
    <h3>Insert!<br /> I asked for a flag session, but it wasnt accepted.</h3><br />

    <form action="./msg.php" method="GET">
        <input type="text" style="width: 80%;" name="str" value='echo("I asked for a flag session, but it wasnt accepted.");' placeholder='echo("I asked for a flag session, but it wasnt accepted.");' /> <br />
        <input type="submit" style="width: 80%;" value="Insert!" /> <br />
    </form>
</body>
</html>