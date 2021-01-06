<script>

console.log('%c 경고 : %c 지정된 루트(문제) 외의 BALGAME 사이트를 해킹하여 FALG 획득시 문제가 될 수 있습니다. ', 'background-color:#000000; color:#ffffff; font-size:20px;', 
'background-color:red; color:#ffffff; font-size:20px;');

console.log('%c 안내 : %c BALGAME은 크롬을 추천합니다. (MSIE로 접속 불가능) ', 'background-color:lightblue; color:#000000; font-size:23px;', 
'background-color:green; color:#ffffff; font-size:23px;');


</script>

<?php
    function getBrowser() {
        $broswerList = array('MSIE', 'Chrome', 'Firefox', 'iPhone', 'iPad', 'Android', 'PPC', 'Safari', 'Trident', 'none');
        $browserName = 'none';
        
        foreach ($broswerList as $userBrowser){
            if($userBrowser === 'none') break;
            if(strpos($_SERVER['HTTP_USER_AGENT'], $userBrowser)) {
                $browserName = $userBrowser;
                break;
            }
        }
        return $browserName;
    }
    
    function isBlockBrowser() {
        $BrowserName = getBrowser();
        if($BrowserName === 'MSIE'||$BrowserName === 'Trident'){
            echo("<script>location.replace('../NotSupportBrowser.php');</script>"); 
        }
    }
?>