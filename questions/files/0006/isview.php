<?php
 
$conn2 = mysqli_connect("localhost", "root", "root", "flag_is_habwzalvtsbt4607");
$conn2->set_charset("utf8");

$no = $_GET["no"];

$result = mysqli_query($conn2, "SELECT * FROM sql_injection WHERE no ={$no}");
$row = mysqli_fetch_array($result);

include "./index.php";
echo "<br />";

if(preg_match("/union|having|\-\-|\//i",$no)) exit ("Hack!!!");

if(mysqli_num_rows($result) > 0)
{     
    echo "exist! <br />";
} else {   
    echo "doesn't exist!";
}

 
?>
