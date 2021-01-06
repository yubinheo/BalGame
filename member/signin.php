<?php
include "../db.php";
if($_POST["id"] == "" || $_POST["pwd"] == ""){
    echo '<script> alert("빈 문자열 발견!"); history.back(); </script>';
    
} else {
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $realid = mysqli_real_escape_string($conn, $id);
    $realpwd = mysqli_real_escape_string($conn, $pwd);

    $sql = mysqli_query($conn,"select * from users where id='".$realid."'") or die ("알수없는 오류");
    $member = $sql->fetch_array();
    $hash_pwd = $member['pwd'];

    if(password_verify($realpwd, $hash_pwd)) 
    {
        $_SESSION['id'] = $member["id"];
        $_SESSION['name'] = $member["name"];
        $_SESSION['egv'] = $member["egv"];
        $_SESSION['admin'] = $member["permission"];

        echo "<script>alert('로그인 성공!'); location.href='../questions'; </script>";
    }
    else{
        echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
    }
}
?>