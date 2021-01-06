<?php
include "../db.php";

$title = $_POST['title'];
$contents = $_POST['contents'];
$page = $_POST['page'];
$hint = $_POST['hint'];
$number = $_POST['number'];
$score = $_POST['score'];
$flag = $_POST['flag'];

$real_title = mysqli_real_escape_string($conn, $title);
$real_contents = mysqli_real_escape_string($conn, $contents);
$real_page = mysqli_real_escape_string($conn, $page);
$real_hint = mysqli_real_escape_string($conn, $hint);
$real_flag = mysqli_real_escape_string($conn, $flag);

$daily = array('일','월','화','수','목','금','토'); //요일을 배열로
$date = date('y.m.d'); 
$weekday = $daily[date('w')];  
$fulldate = $date."(".$weekday.")";

if($_SESSION['admin'] === "2") {
    if($real_contents == ""){
        echo '<script> alert("본문을 입력하세요."); location.href="./write.php"; </script>';
    } else {
        $result = mysqli_query($conn, "INSERT INTO questions_web(title,contents,page,hint,quest_num,flag,score,created,writer)VALUES('".$real_title."','".$real_contents."','".$real_page."','".$real_hint."','".$number."','".$real_flag."','".$score."','".$fulldate."','".$_SESSION['name']."')") or die ("알수없는 오류");
        echo '<script> alert("글 작성이 완료되었습니다!"); location.href="../questions"; </script>';  
    }
} else {
    echo '<script> alert("당신은 관리자가 아닙니다."); location.href="../questions"; </script>';  
}
?>