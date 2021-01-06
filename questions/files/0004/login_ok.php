<?php 

include "./conn.php";

$id = $_POST['id'];
$pw = $_POST['pw'];
  
$query = "select * from quest_0004 where user_id='$id' and user_pw='$pw'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if(mysqli_num_rows($result) > 0) {

    include_once "./user.php";

} else {
    echo "<script>location.href='./index.php';</script>";
}

?>