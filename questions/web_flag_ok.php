<?php

include "../db.php";

$flag = $_GET["flag"];
$number = $_GET["quest_num"];
$real_flag = mysqli_real_escape_string($conn, $flag);
$real_number = mysqli_real_escape_string($conn, $number);

$daily = array('일','월','화','수','목','금','토'); //요일을 배열로
$date = date('y.m.d'); 
$weekday = $daily[date('w')];  
$fulldate = $date."(".$weekday.")";


$sql = "SELECT EXISTS (SELECT * FROM questions_web WHERE flag='".$real_flag."' and quest_num='".$real_number."') as ok" or die("알 수 없는 오류");

$query = mysqli_query($conn, $sql);
$isok = $query->fetch_array();

if($isok['ok'] == 1) { 
    
    $query2 = mysqli_query($conn, "SELECT EXISTS (SELECT * FROM finish_users WHERE quest_num='".$real_number."' and user_id='".$_SESSION['id']."') as ok") or die("알 수 없는 오류");
    $data = $query2->fetch_array();

    if($data['ok']==1) {
        echo ("<script>alert('이미 풀었습니다!'); history.back();</script>");
    } else {
        echo "<script>alert('정답!'); location.href='../questions/webhack.php';</script>";
        $sql3 = "INSERT ignore INTO finish_users(quest_num, user_id, egv, finished) VALUES('".$real_number."', '".$_SESSION['id']."', '".$_SESSION['egv']."', '".$fulldate."')";
        $query3 = mysqli_query($conn, $sql3);
        $query4 = mysqli_query($conn, "SELECT * from questions_web where quest_num = '".$real_number."'") or die("알 수 없는 오류");
        $data3 = $query4->fetch_array();
        $sql_update = mysqli_query($conn, "UPDATE users SET score = score + '".$data3["score"]."' WHERE id='".$_SESSION['id']."'") or die("알 수 없는 오류");
    }

} else {
    echo "<script>alert('오답!'); location.href='../questions/webhack.php';</script>";
}

?>
