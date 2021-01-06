<?php 
include "../../../db.php";

if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후 이용가능합니다.'); history.back(-1);</script>";
} 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What The Fuck!!!!!</title>
</head>
<body>
    <h2>왜 내 코드가 안보여!!! what the fuck!!!!!</h2>
    <div>
        <input value="View Code" onclick="if(this.parentNode.getElementsByTagName('div')[0].style.display != ''){this.parentNode.getElementsByTagName('div')[0].style.display = '';this.value = 'Hide Code';}else{this.parentNode.getElementsByTagName('div')[0].style.display = 'none'; this.value = 'View Code';}" type="button" />
        <div style="display: none;">eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0 5="b";0 3=1.4.6.7(\'c\');0 2=1.4.6.7(\'d\');0 8=1.9.e(5,3,{2:2});0 a=1.9.f(8,3,{2:2});0 g=a.h(1.4.i));',19,19,'var|CryptoJS|iv|key|enc|randArr|Hex|parse|encrypted|AES|decrypted|flag_is_VAXLwzyMKNoZkhNi|000102030405060708090a0b0c0d0e0f|101112131415161718191a1b1c1d1e1f|encrypt|decrypt|final_decrypted|toString|Utf8'.split('|'),0,{})) </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
</body>
</html>