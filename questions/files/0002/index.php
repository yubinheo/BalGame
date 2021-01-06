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
    <title>Fake it flag~</title>
    <style>
     /* Flag_is_666C61675F69735F58597569645A7856547A6D625A455447 */
     .decode {
         font-size: 20px;
     }
    </style>
</head>
<body>
    <h2>JinSu : I'm so sick of this fake flag, fake flag, fake flag~</h2>
</body>
</html>