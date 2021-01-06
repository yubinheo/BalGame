<?php 

include "../../../db.php";
if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후 이용가능합니다.'); history.back(-1);</script>";
} else {
    setcookie("Flag_Cookie", "flag_is_4cHL9AFRj4RR9vKn", 7000, "/");
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Cookie!</title>
</head>
<body>
    <h2>맛있는 Flag_Cookie를 구워줄 수 있겠니?</h2>
</body>
</html>