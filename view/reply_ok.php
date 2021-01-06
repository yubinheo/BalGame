<?php
include "../db.php";

$contents = $_POST['contents'];
$gubun = $_POST['gubun'];
$post_idx = $_POST['post_idx'];

$real_contents = mysqli_real_escape_string($conn, $contents);
$real_gubun = mysqli_real_escape_string($conn, $gubun);
$real_postidx = mysqli_real_escape_string($conn, $post_idx);

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
        if ($gubun === "comment") {
            $result = mysqli_query($conn, "INSERT INTO reply_qna(gubun,contents,post_idx,writer_code,writer,created)VALUES('".$real_gubun."','".$real_contents."','".$real_postidx."','".$_SESSION['egv']."','".$_SESSION['name']."','".$fulldate."')") or die ("알수없는 오류");
            echo '<script> alert("답글 작성이 완료되었습니다!"); history.back(-1); </script>';  
        } else if ($gubun === "reply") {
            $result = mysqli_query($conn, "INSERT INTO reply_qna(gubun,contents,post_idx,writer_code,writer,created)VALUES('".$real_gubun."','".$real_contents."','".$real_postidx."','".$_SESSION['egv']."','".$_SESSION['name']."','".$fulldate."')") or die ("알수없는 오류");
            echo '<script> alert("답글 작성이 완료되었습니다!"); history.back(-1); </script>';  
        }
        
    }
}

?>