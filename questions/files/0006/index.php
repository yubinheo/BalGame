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
    <title>Drop the blinds!</title>
</head>
<body>
    <h2>Drop the blinds!</h2>
    <h3>Oops! I forgot the name of my DB....<br />
    I'll get the name right, so you figure out the length of my db!<br />
    And lower the  <span style="color:red">blind</span>!</h3><br />

    <form action="./isview.php" method="GET">
        <input type="text" style="width:60%" name="no" placeholder='number' /> <br />
        <input type="submit" value="제출!" /> <br />
    </form> <br />

    <form action="./get_length_flag.php" method="post">
        <input type="text" style="width:60%" name="length" placeholder='Tell me the length of my DB!' /> <br />
        <input type="submit" value="제출!" /> <br />
    </form>
</body>
</html>