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

if(!isset($_SESSION['id'])){
    echo "<script>alert('로그인 후 이용가능합니다.'); history.back(-1);</script>";
} else {
    if($real_contents == ""){
        echo '<script> alert("본문을 입력하세요."); history.back(-1); </script>';
    } else {
        $result = mysqli_query($conn, "INSERT INTO qna(kag,title,contents,writer,writer_code,created)VALUES('".$real_kag."','".$real_title."','".$real_contents."','".$_SESSION['name']."','".$_SESSION['egv']."','".$fulldate."')") or die ("알수없는 오류");
        echo '<script> alert("질문 작성이 완료되었습니다!"); location.href="../questions/QNA.php"; </script>';  
    }
}

?>