<?php

session_start();
$conn = mysqli_connect("localhost", "root", "root", "develquiz");
$conn->set_charset("utf8");
$connect="yes";

function mq($sql) {
    global $conn;
    return $conn->query($sql);
}

function GenerateString($length)  
{  
    $characters  = "0123456789";  
    $characters .= "abcdefghijklmnopqrstuvwxyz";  
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  
    $characters .= "_";  
      
    $string_generated = "";  
      
    $nmr_loops = $length;  
    while ($nmr_loops--)  
    {  
        $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];  
    }  
      
    return $string_generated;  
}  

function email_preg($email) {

	if ( ($p=strpos($email,'@'))>4 ) $email = substr_replace($email,str_repeat('○',$l=$p-4),4,$l); 
    else $email = substr_replace($email,str_repeat('○',$l=$p-2),2,$l);
	return $email;

}

?>