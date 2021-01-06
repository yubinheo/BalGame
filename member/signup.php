<?php
include "../db.php";

if($_POST["id"] == "" || $_POST["pwd"] == "" || $_POST["repwd"] == "" || $_POST["name"] == ""){
    echo '<script> alert("빈 문자열 발견!"); location.href="../questions/"; </script>';
} else {
    echo $Last_classnum;

    if($_POST['pwd']!=$_POST['repwd']){
        echo '<script> alert("패스워드가 일치하지 않습니다."); history.back(); </script>';

    } else {

        $sql = mysqli_query($conn, "SELECT EXISTS (SELECT * from users WHERE id='".$_POST["id"]."') as success");
        $usernamecount = $sql->fetch_array();

        if($usernamecount['success']==1) {
            echo ("<script>alert('중복된 아이디입니다!'); history.back();</script>");

        } else {
            
            $id = $_POST["id"];
            $uid = mysqli_real_escape_string($conn, $id);
            $name = $_POST["name"];
            $uname = mysqli_real_escape_string($conn, $name);
            $pwd = $_POST["pwd"];
            $str = preg_replace("/\s{1,}1\=(.*)+/","",$pwd); // 공백이후 1=1이 있을 경우 제거
            $str = preg_replace("/\s{1,}(or|and|null|where|limit)/i"," ",$pwd); // 공백이후 or, and 등이 있을 경우 제거
            $str = preg_replace("/[\s\t\'\;\=]+/","", $pwd); // 공백이나 탭 제거, 특수문자 제거
            $hash_upwd = password_hash($str, PASSWORD_DEFAULT);
            
            $len = rand(8, 14);
            $egv = GenerateString($len);

            $p_hash_upwd = mysqli_real_escape_string($conn, $hash_upwd);
            $special_pattern = "/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";
            $default_permission = "0";
            $daily = array('일','월','화','수','목','금','토'); //요일을 배열로
            $date = date('y.m.d'); 
            $weekday = $daily[date('w')];  
            $fulldate = $date."(".$weekday.")";

            $ip = $_SERVER['REMOTE_ADDR'];

            if( preg_match($special_pattern, $uname) ){

                $msg = "이름에 특수문자는 사용할 수 없습니다.";
                echo("<script>alert('$msg');history.back();</script>");
                exit;

            } else {
                $sql7 = mysqli_query($conn, "SELECT EXISTS (SELECT * from users WHERE ip='".$ip."') as success");
                $ip_check = $sql7->fetch_array();
                if($ip_check['success']==1) {
                    echo ("<script>alert('같은 ip로 2회 가입할 수 없습니다.'); history.back();</script>");
                } else {
                    $result = mysqli_query($conn, "INSERT INTO users(id,egv,pwd,name,ip,sdate)VALUES('".$uid."','".$egv."','".$p_hash_upwd."','".$uname."','".$ip."','".$fulldate."')") or die ("알수없는 오류");
                    echo ("<script>alert('회원가입이 되었습니다!'); location.href='../questions';</script>");
                }
            
                
            }
        }
    }
}
?>