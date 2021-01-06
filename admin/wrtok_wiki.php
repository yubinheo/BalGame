<?php
include "../db.php";

$title = $_POST['title'];
$contents = $_POST['contents'];
$kag = $_POST['kag'];

$real_title = mysqli_real_escape_string($conn, $title);
$real_contents = mysqli_real_escape_string($conn, $contents);
$real_kag = mysqli_real_escape_string($conn, $kag);

$daily = array('일','월','화','수','목','금','토'); //요일을 배열로
$date = date('y.m.d'); 
$weekday = $daily[date('w')];  
$fulldate = $date."(".$weekday.")";

if($_SESSION['admin'] === "2") {
    if($real_contents == ""){
        echo '<script> alert("본문을 입력하세요."); location.href="./write.php"; </script>';
    } else {
        $result = mysqli_query($conn, "INSERT INTO wiki(kag,title,contents,writer,created)VALUES('".$real_kag."','".$real_title."','".$real_contents."','".$_SESSION['name']."','".$fulldate."')") or die ("알수없는 오류");
        echo '<script> alert("위키 작성이 완료되었습니다!"); location.href="../questions/wiki.php"; </script>';  
    }
} else {
    echo '<script> alert("당신은 관리자가 아닙니다."); location.href="../questions"; </script>';  
}
?>